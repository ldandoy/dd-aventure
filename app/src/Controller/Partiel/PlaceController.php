<?php

namespace App\Controller\Partiel;

use App\Entity\Place;
use App\Entity\Item;
use App\Entity\Freak;
use App\Entity\PlaceStory;
use App\Service\PersoService;
use App\Service\ItemService;
use App\Service\PlaceStoryService;
use App\Service\FreakService;
use App\Service\FightService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

#[IsGranted('ROLE_USER')]
class PlaceController extends AbstractController
{
    #[Route('/partiel/place/{place_id}/story', name: 'app_partiel_place_story')]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function story(
        Place $place, 
        PersoService $persoService,
        ItemService $itemService,
        PlaceStoryService $placeStoryService,
        FreakService $freakService
    ): Response
    {
        $perso  = $persoService->getActivePerso();
        $story  = $placeStoryService->getRandPlaceStory($place);
        $item   = $itemService->getRandItem($place);
        $freak  = null;

        if ($story->getType()->getId() == 3) {
            $freak = $freakService->getRandFreak();
        }

        return $this->render('partiel/place/story.html.twig', [
            'perso' => $perso,
            'place' => $place,
            'story' => $story,
            'item'  => $item,
            'freak' => $freak
        ]);
    }

    #[Route('/partiel/place/{place_id}/take/{item_id}', name: 'app_partiel_place_take')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('item', options: ['id' => 'item_id'])]
    public function take(
        Place $place,
        Item $item,
        PersoService $persoService,
    ): Response
    {
        $persoService->addItem($item);

        $this->addFlash(
            'success',
            $item->getName() . ' bien ramassé !'
        );

        return $this->redirectToRoute('app_partiel_place_story', ['place_id' => $place->getId()]);
    }

    #[Route('/partiel/place/{place_id}/test/{story_id}', name: 'app_partiel_place_test')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('story', options: ['id' => 'story_id'])]
    public function test(
        Place $place,
        PlaceStory $story,
        PersoService $persoService
    ): Response
    {
        $perso = $persoService->getActivePerso();

        return $this->render('partiel/place/test.html.twig', [
            'perso' => $perso,
            'place' => $place,
            'story' => $story
        ]);
    }

    #[Route('/partiel/place/{place_id}/test/{story_id}/result', name: 'app_partiel_place_test_result')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('story', options: ['id' => 'story_id'])]
    public function result(
        Place $place,
        PlaceStory $story,
        PersoService $persoService
    ): Response
    {
        $perso = $persoService->getActivePerso();

        $ddreuslt = random_int(0, 20);

        if ($ddreuslt > $story->getPlaceTest()->getDifficulty()) {
            $persoService->addXP($story->getPlaceTest()->getXp());
        }

        return $this->render('partiel/place/test_result.html.twig', [
            'perso'     => $perso,
            'place'     => $place,
            'story'     => $story,
            'ddresult'  => $ddreuslt
        ]);
    }

    #[Route('/partiel/place/{place_id}/story/{story_id}/fight/atk', name: 'app_partiel_place_fight_atk')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('story', options: ['id' => 'story_id'])]
    public function atk(
        Place $place,
        PlaceStory $story,
        PersoService $persoService,
        FightService $fightService,
        Request $request
    ): Response
    {
        $session = $request->getSession();
        $perso = $persoService->getActivePerso();
        
        /*if ($fightService->getFight() == null) {
            return $this->redirectToRoute('app_partiel_place_fight', [
                'place_id' => $place->getId(),
                'story_id' => $story->getId(),
                'freak_id' => $freak->getId()
            ]);
        }*/

        $fightService->makeFight();

        // Cas le perso meurt
        if ($fightService->getFight()->perso->getPdv() <= 0) {

        }

        // Cas l'ennemi est mort
        if ($fightService->getFight()->freak->getPdv() <= 0) {
            $fightService->addStep('Vous avez tuer votre ennemi !');
            $fightService->endFight(true);
        }

        return $this->render('partiel/place/fight.html.twig', [
            'perso'     => $perso,
            'place'     => $place,
            'story'     => $story,
            'fight'     => $fightService->getFight(),
            'steps'     => $session->get('steps')
        ]);
    }

    #[Route('/partiel/place/{place_id}/story/{story_id}/fight/flee', name: 'app_partiel_place_fight_flee')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('story', options: ['id' => 'story_id'])]
    public function flee(
        Place $place,
        FightService $fightService,
        Request $request
    ): Response
    {
        if ($fightService->getFight() !== null) {
            $fightService->endFight();
        }

        $session = $request->getSession();
        $session->remove('steps');

        return $this->redirectToRoute('app_partiel_place_story', ['place_id' => $place->getId()]);
    }

    #[Route('/partiel/place/{place_id}/story/{story_id}/fight/{freak_id}', name: 'app_partiel_place_fight')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('story', options: ['id' => 'story_id'])]
    #[Entity('freak', options: ['id' => 'freak_id'])]
    public function fight(
        Place $place,
        PlaceStory $story,
        Freak $freak,
        PersoService $persoService,
        FightService $fightService,
        Request $request
    ): Response
    {
        $session = $request->getSession();
        $perso = $persoService->getActivePerso();

        if ($fightService->getFight() === null) {
            $fightService->startFight($freak);
        }

        return $this->render('partiel/place/fight.html.twig', [
            'perso'     => $perso,
            'place'     => $place,
            'story'     => $story,
            'freak'     => $freak,
            'fight'     => $fightService->getFight(),
            'steps'     => $session->get('steps')
        ]);
    }
}