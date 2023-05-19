<?php

namespace App\Controller\Partiel;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Service\PersoService;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/partiel/aventure/start', name: 'app_partiel_aventure_start')]
    public function start(
        PersoService $persoService,
    ): Response
    {
        $perso  = $persoService->getActivePerso();
        
        return $this->render('partiel/aventure/start.html.twig', [
            'perso' => $perso,
        ]);
    }
}