<?php

namespace App\Controller\Partiel;

use App\Entity\Place;
use App\Entity\Item;
use App\Entity\PlaceStory;
use App\Service\PersoService;
use App\Service\ItemService;
use App\Service\PlaceStoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        PlaceStoryService $placeStoryService
    ): Response
    {
        $perso = $persoService->getPerso();

        $story = $placeStoryService->getRandPlaceStory($place);

        $item = $itemService->getRandItem($place);

        return $this->render('partiel/place/story.html.twig', [
            'perso' => $perso,
            'place' => $place,
            'story' => $story,
            'item' => $item
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
        $perso = $persoService->getPerso();
        $persoService->addItem($perso, $item);

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
        $perso = $persoService->getPerso();

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
        $perso = $persoService->getPerso();

        $ddreuslt = random_int(0, 20);

        if ($ddreuslt > $story->getPlaceTest()->getDifficulty()) {
            $persoService->addXP($perso, $story->getPlaceTest()->getXp());
        }

        return $this->render('partiel/place/test_result.html.twig', [
            'perso'     => $perso,
            'place'     => $place,
            'story'     => $story,
            'ddresult'  => $ddreuslt
        ]);
    }
}