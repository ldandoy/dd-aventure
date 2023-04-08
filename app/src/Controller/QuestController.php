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
use App\Service\PersoService;

class QuestController extends AbstractController
{
    #[Route('/quest/{quest_id}/accept', name: 'app_quest_accept')]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function accept(
        Quest $quest,
        EntityManagerInterface $em,
        PersoService $persoService
    ): Response
    {
        $perso = $persoService->getPerso();
        $perso->addQuest($quest);

        $em->persist($perso);
        $em->flush();

        $this->addFlash(
            'success',
            'Quête accepté !'
        );

        return $this->redirectToRoute('app_city_show', ['city_id' => $perso->getPlace()->getCity()->getId()]);
    }

    #[Route('/quest/{quest_id}/decline', name: 'app_quest_decline')]
    #[Entity('quest', options: ['id' => 'quest_id'])]
    public function decline(
        Quest $quest,
        PersoService $persoService,
        EntityManagerInterface $em
    ): Response
    {
        $perso = $persoService->getPerso();
        $perso->removeQuest($quest);

        $em->persist($perso);
        $em->flush();

        $this->addFlash(
            'success',
            'Quête refusé !'
        );

        return $this->redirectToRoute('app_city_show', ['city_id' => $perso->getPlace()->getCity()->getId()]);
    }
}
