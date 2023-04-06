<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Place;
use App\Entity\Perso;

class PlaceController extends AbstractController
{
    #[Route('/place/{place_id}', name: 'app_place_show')]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function index(Place $place, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        return $this->render('place/show.html.twig', [
            "place"  => $place,
            'perso' => $perso
        ]);
    }
}
