<?php

namespace App\Controller\Partiel;

use App\Entity\Place;
use App\Entity\City;
use App\Entity\Quest;
use App\Entity\Perso;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

#[IsGranted('ROLE_USER')]
class CityController extends AbstractController
{
    #[Route('/partiel/city/{city_id}', name: 'app_partiel_city_show')]
    #[Entity('city', options: ['id' => 'city_id'])]
    public function show(City $city, EntityManagerInterface $em): Response
    {
        $places = $em->getRepository(Place::class)->findBy([
            'city' => $city
        ]);

        return $this->render('partiel/city/show.html.twig', [
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

    #[Route('/partiel/city/{city_id}/place/{place_id}/quest/{quest_id}', name: 'app_partiel_city_place_quest')]
    #[Entity('city', options: ['id' => 'city_id'])]
    #[Entity('place', options: ['id' => 'place_id'])]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function quest(City $city, Place $place, Quest $quest, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        return $this->render('partiel/city/quest.html.twig', [
            'city'  => $city,
            'place' => $place,
            'quest' => $quest,
            'perso' => $perso
        ]);
    }
}
