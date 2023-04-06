<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Zone;
use App\Entity\Perso;

class MapController extends AbstractController
{
    #[Route('/map', name: 'app_map_index')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $zones = $em->getRepository(Zone::class)->findBy([
            'active' => false
        ]);

        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());
        
        return $this->render('map/index.html.twig', [
            "zones" => $zones,
            'perso' => $perso
        ]);
    }
}
