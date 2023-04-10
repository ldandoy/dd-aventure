<?php

namespace App\Controller;

use App\Entity\PersoItem;
use App\Form\PersoItemType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test_index')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', []);
    }

    #[Route('/test2', name: 'app_test_index2')]
    public function index2(): Response
    {
        return $this->render('test/index2.html.twig', []);
    }

    #[Route('/test3', name: 'app_test_index3')]
    public function index3(): Response
    {
        return $this->render('test/index3.html.twig', []);
    }

    #[Route('/live', name: 'app_test_live')]
    public function live(Request $request, EntityManagerInterface $em): Response
    {
        $persoItem = new PersoItem();

        /*$form = $this->createForm(PersoItemType::class, $persoItem)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($persoItem);
            $em->flush();

            return $this->redirectToRoute('app_test_live');
        }*/

        return $this->render('test/live.html.twig', [
            'persoItem' => $persoItem
        ]);
    }
}