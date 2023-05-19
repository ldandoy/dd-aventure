<?php

namespace App\Controller;

use App\Entity\Perso;
use App\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Service\PersoService;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/aventure/{perso_id}/start', name: 'app_aventure_start')]
    #[Entity('perso', options: ['id' => 'perso_id'])]
    public function start(
        Perso $perso,
        PersoService $persoService
    ): Response
    {
        $persoService->setCurrentPersoId($perso);

        if ($perso->getPlace() !== null) {
            $route = "test";
        } else {
            $route = "app_partiel_aventure_start";
        }
        
        return $this->render('aventure/index.html.twig', [
            "perso" => $perso,
            "url"   => $route
        ]);
    }
}
