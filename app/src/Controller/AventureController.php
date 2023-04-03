<?php

namespace App\Controller;

use App\Entity\Perso;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/aventure/{id}', name: 'app_aventure_index')]
    public function index(Perso $perso, Request $request): Response
    {
        $session = $request->getSession();
        $session->set('perso', $perso);

        return $this->render('aventure/index.html.twig', [
            'perso' => $session->get('perso')
        ]);
    }
}
