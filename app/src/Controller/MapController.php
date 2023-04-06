<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Zone;

class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $zones = $em->getRepository(Zone::class)->findBy([
            'active' => false
        ]);
        
        return $this->render('map/index.html.twig', [
            "zones" => $zones
        ]);
    }
}
