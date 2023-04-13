<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\Place;
use App\Entity\PlaceStory;
use App\Service\PersoService;
use App\Service\PlaceStoryService;

class PlaceController extends AbstractController
{
    #[Route('/place/{place_id}/story', name: 'app_place_story')]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function story(
        Place $place,
        PersoService $persoService,
        PlaceStoryService $placeStoryService
    ): Response
    {
        $perso = $persoService->getPerso();
        $story = $placeStoryService->getRandPlaceStory($place);

        return $this->render('place/story.html.twig', [
            "place"     => $place,
            'perso'     => $perso,
            'story'     => $story
        ]);
    }

    #[Route('/place/{place_id}', name: 'app_place_show')]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function index(
        Place $place,
        PersoService $persoService
    )
    {
        $perso = $persoService->getPerso();

        return $this->render('place/show.html.twig', [
            "place"  => $place,
            'perso' => $perso
        ]);
    }
}
