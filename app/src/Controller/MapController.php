<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Zone;
use App\Service\PersoService;

class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map_index')]
    public function index(EntityManagerInterface $em, PersoService $persoService): Response
    {
        $zones = $em->getRepository(Zone::class)->findBy([
            'active' => false
        ]);

        $perso = $persoService->getPerso();
        
        return $this->render('map/index.html.twig', [
            "zones" => $zones,
            'perso' => $perso
        ]);
    }
}
