<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Service\PersoService;
use App\Service\PlaceService;
use App\Entity\Perso;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/aventure/{perso_id}/start', name: 'app_aventure_start')]
    #[Entity('perso', options: ['id' => 'perso_id'])]
    public function start(
        Perso $perso,
        PersoService $persoService,
        PlaceService $placeService
    ): Response
    {
        $persoService->setCurrentPersoId($perso);

        if ($perso->getPlace() === null) {
            $perso->setPlace($placeService->getPlaceById(1));
            $persoService->save($perso);
        }
        
        return $this->render('aventure/index.html.twig', [
            "perso" => $perso
        ]);
    }
}
