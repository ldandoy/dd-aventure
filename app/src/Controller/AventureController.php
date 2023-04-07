<?php

namespace App\Controller;

use App\Entity\Perso;
use App\Entity\City;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/aventure/{perso_id}/start/{city_id}', name: 'app_aventure_start')]
    #[Entity('perso', options: ['id' => 'perso_id'])]
    #[Entity('city', options: ['id' => 'city_id'])]
    public function start(Perso $perso, City $city, Request $request): Response
    {
        $session = $request->getSession();
        $session->set('perso', $perso);

        /*return $this->render('aventure/index.html.twig', [
            'perso' => $session->get('perso')
        ]);*/

        return $this->redirectToRoute('app_city_show', ['city_id' => $city->getId()]);
    }
}
