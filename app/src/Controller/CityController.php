<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\City;
use App\Service\PersoService;

class CityController extends AbstractController
{
    #[Route('/city/{city_id}', name: 'app_city_show')]
    #[Entity('city', options: ['id' => 'city_id'])]
    public function show(City $city, PersoService $persoService): Response
    {
        $perso = $persoService->getPerso();

        return $this->render('city/show.html.twig', [
            "city"  => $city,
            'perso' => $perso
        ]);
    }
}
