<?php

namespace App\Controller\Partiel;

use App\Entity\Perso;
use App\Entity\City;
use App\Entity\Place;
use App\Entity\Pnj;
use App\Entity\Quest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

#[IsGranted('ROLE_USER')]
class AventureController extends AbstractController
{
    #[Route('/partiel/aventure/place/{id}', name: 'app_partiel_aventure_place')]
    #[Route('/partiel/aventure/start', name: 'app_partiel_aventure_start')]
    public function start(Place $place = null, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        if ($place == null) {
            $place = $perso->getPlace();
        }
        
        return $this->render('partiel/aventure/place.html.twig', [
            'perso' => $perso,
            'place' => $place,
            'city'  => $place->getCity()
        ]);
    }

    #[Route('/partiel/aventure/city/{city_id}/pnj/{pnj_id}/dialog/{quest_id}', name: 'app_partiel_aventure_city_pnj_dialog')]
    #[Entity('city', options: ['id' => 'city_id'])]
    #[Entity('pnj', options: ['id' => 'pnj_id'])]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function pnj(City $city, Pnj $pnj, Quest $quest, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        
        return $this->render('partiel/aventure/city_pnj_dialog.html.twig', [
            'perso' => $em->getRepository(Perso::class)->find($session->get('perso')->getId()),
            'city'  => $city,
            'pnj'   => $pnj,
            'quest' => $quest
        ]);
    }

    #[Route('/partiel/aventure/city/{id}', name: 'app_partiel_aventure_city')]
    public function city(City $city, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        
        return $this->render('partiel/aventure/city.html.twig', [
            'perso' => $em->getRepository(Perso::class)->find($session->get('perso')->getId()),
            'city' => $city
        ]);
    }

    #[Route('/partiel/aventure/city/{city_id}/pnj/{pnj_id}/dialog/{quest_id}/accepte', name: 'app_partiel_aventure_city_pnj_dialog_accepte')]
    #[Entity('city', options: ['id' => 'city_id'])]
    #[Entity('pnj', options: ['id' => 'pnj_id'])]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function quest_accepte(City $city, Pnj $pnj, Quest $quest, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        $user = $this->getUser();
        $user->addQuest($quest);

        $em->persist($user);
        $em->flush();

        return $this->render('partiel/aventure/place.html.twig', [
            'perso' => $perso,
            'place' => $perso->getPlace(),
            'city'  => $city
        ]);
    }

    #[Route('/partiel/aventure/city/{city_id}/pnj/{pnj_id}/dialog/{quest_id}/decline', name: 'app_partiel_aventure_city_pnj_dialog_decline')]
    #[Entity('city', options: ['id' => 'city_id'])]
    #[Entity('pnj', options: ['id' => 'pnj_id'])]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function quest_decline(City $city, Pnj $pnj, Quest $quest, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        $user = $this->getUser();
        $user->removeQuest($quest);

        $em->persist($user);
        $em->flush();

        return $this->render('partiel/aventure/place.html.twig', [
            'perso' => $perso,
            'place' => $perso->getPlace(),
            'city'  => $city
        ]);
    }
}
