<?php

namespace App\Controller\Partiel;

use App\Entity\Place;
use App\Entity\Item;
use App\Entity\PlaceStory;
use App\Service\PersoService;
use App\Service\ItemService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

#[IsGranted('ROLE_USER')]
class PlaceController extends AbstractController
{
    #[Route('/partiel/place/{place_id}/story', name: 'app_partiel_place_story')]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function story(
        Place $place, 
        EntityManagerInterface $em,
        PersoService $persoService,
        ItemService $itemService
    ): Response
    {
        $perso = $persoService->getPerso();

        $story = $em->getRepository(PlaceStory::class)->getRandStory($place);

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
}