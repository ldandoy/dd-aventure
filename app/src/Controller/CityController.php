<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\City;
use App\Entity\Perso;

class CityController extends AbstractController
{
    #[Route('/city/{city_id}', name: 'app_city_show')]
    #[Entity('city', options: ['id' => 'city_id'])]
    public function show(City $city, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        return $this->render('city/show.html.twig', [
            "city"  => $city,
            'perso' => $perso
        ]);
    }
}
