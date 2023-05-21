<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\Place;
use App\Entity\Freak;
use App\Service\PersoService;
use App\Service\PlaceStoryService;
use App\Service\FightService;

class PlaceController extends AbstractController
{
    #[Route('/place/{place_id}', name: 'app_place_show')]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function index(
        Place $place,
        PersoService $persoService,
        PlaceStoryService $placeStoryService
    ): Response
    {
        $perso = $persoService->getActivePerso();
        $story = $placeStoryService->getRandPlaceStory($place);
        $freak = $placeStoryService->getRandFreak($place);

        return $this->render('place/show.html.twig', [
            "place"     => $place,
            'perso'     => $perso,
            'story'     => $story,
            'freak'     => $freak
        ]);
    }

    #[Route('/place/{place_id}/fight/{freak_id}', name: 'app_place_fight')]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('freak', options: ['id' => 'freak_id'])]
    public function fight(
        Place $place,
        Freak $freak,
        PersoService $persoService,
        FightService $fightService
    ): Response
    {
        $perso = $persoService->getActivePerso();

        $fight = $fightService->getFight();

        if ($fight != null) {
            $fightService->makeFight();

            if ($fight->freak->getPdv() < 0) {
                $fightService->clearSteps();
                $fightService->endFight(true);
                $steps = $fightService->getSteps();
                $fightService->clearSteps();
            } else if ($perso->getPdv() < 0) {
                $fightService->clearSteps();
                $fightService->endFight(false);
                $steps = $fightService->getSteps();
                $fightService->clearSteps();
            } else {
                $steps = $fightService->getSteps();
            }
        } else {
            $fightService->clearSteps();
            $fightService->startFight($freak);
            $steps = $fightService->getSteps();
        }

        $fight = $fightService->getFight();

        return $this->render('place/fight.html.twig', [
            "place"     => $place,
            'perso'     => $perso,
            'steps'     => $steps,
            'fight'     => $fight
        ]);
    }
}
