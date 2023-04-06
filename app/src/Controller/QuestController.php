<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Quest;
use App\Entity\Perso;

class QuestController extends AbstractController
{
    #[Route('/quest/{quest_id}/accept', name: 'app_quest_accept')]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function accept(Quest $quest, Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $user->addQuest($quest);

        $em->persist($user);
        $em->flush();

        $this->addFlash(
            'success',
            'Quête accepté !'
        );

        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        return $this->redirectToRoute('app_city_index', ['city_id' => $perso->getPlace()->getCity()->getId()]);
    }

    #[Route('/quest/{quest_id}/decline', name: 'app_quest_decline')]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function decline(Quest $quest, Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $user->removeQuest($quest);

        $em->persist($user);
        $em->flush();

        $this->addFlash(
            'success',
            'Quête refusé !'
        );

        $session = $request->getSession();
        $perso = $em->getRepository(Perso::class)->find($session->get('perso')->getId());

        return $this->redirectToRoute('app_city_index', ['city_id' => $perso->getPlace()->getCity()->getId()]);
    }
}
