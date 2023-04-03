<?php

namespace App\Controller\Partiel;

use App\Entity\Perso;
use App\Entity\City;
use App\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/partiel/aventure/place/{id}', name: 'app_partiel_aventure_place')]
    #[Route('/partiel/aventure/start', name: 'app_partiel_aventure_start')]
    public function start(Place $place = null, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        if ($place == null) {
            $place = $perso->getPlace();
        }
        
        return $this->render('partiel/aventure/place.html.twig', [
            'perso' => $perso,
            'place' => $place
        ]);
    }

    #[Route('/partiel/aventure/city/{id}', name: 'app_partiel_aventure_city')]
    public function city(City $city, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        
        return $this->render('partiel/aventure/city.html.twig', [
            'perso' => $em->getRepository(Perso::class)->find($session->get('perso')->getId()),
            'city' => $city
        ]);
    }
}
