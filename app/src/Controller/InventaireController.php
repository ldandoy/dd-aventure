<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\PersoService;

class InventaireController extends AbstractController
{
    #[Route('/inventaire', name: 'app_inventaire')]
    public function index(PersoService $persoService): Response
    {
        $perso = $persoService->getPerso();

        return $this->render('inventaire/index.html.twig', [
            'perso' => $perso
        ]);
    }
}
