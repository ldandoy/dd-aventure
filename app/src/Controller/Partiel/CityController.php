<?php

namespace App\Controller\Partiel;

use App\Entity\Place;
use App\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

#[IsGranted('ROLE_USER')]
class CityController extends AbstractController
{
    #[Route('/partiel/city/{city_id}', name: 'app_partiel_city_show')]
    #[Entity('city', options: ['id' => 'city_id'])]
    public function index(City $city, EntityManagerInterface $em): Response
    {
        $places = $em->getRepository(Place::class)->findBy([
            'city' => $city
        ]);

        return $this->render('partiel/city/index.html.twig', [
            'places' => $places,
            'city' => $city
        ]);
    }

    #[Route('/partiel/city/{city_id}/place/{place_id}', name: 'app_partiel_city_place')]
    #[Entity('city', options: ['id' => 'city_id'])]
    #[Entity('place', options: ['id' => 'place_id'])]
    public function place(City $city, Place $place): Response
    {
        return $this->render('partiel/city/place.html.twig', [
            'city'  => $city,
            'place' => $place,
        ]);
    }
}
