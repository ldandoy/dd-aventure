<?php

namespace App\Controller\Partiel;

use App\Entity\Place;
use App\Entity\Perso;
use App\Entity\PlaceStory;
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
    public function story(Place $place, EntityManagerInterface $em, Request $request): Response
    {
        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        $story = $em->getRepository(PlaceStory::class)->getRandStory($place);

        return $this->render('partiel/place/story.html.twig', [
            'perso' => $perso,
            'place' => $place,
            'story' => $story
        ]);
    }
}