<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\City;

class CityController extends AbstractController
{
    #[Route('/city/{id}', name: 'app_city_index')]
    public function index(City $city): Response
    {
        return $this->render('city/index.html.twig', [
            "city" => $city
        ]);
    }
}
