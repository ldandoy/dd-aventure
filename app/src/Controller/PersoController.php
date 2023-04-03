<?php

namespace App\Controller;

use App\Entity\Perso;
use App\Entity\Place;
use App\Form\PersoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[IsGranted('ROLE_USER')]
class PersoController extends AbstractController
{
    #[Route('/persos', name: 'app_perso_index')]
    public function index(EntityManagerInterface $em): Response
    {
        $persos = $em->getRepository(Perso::class)->findBy([
            'user' => $this->getUser()
        ]);
        return $this->render('perso/index.html.twig', [
            'persos' => $persos
        ]);
    }

    #[Route('/persos/add', name: 'app_perso_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $perso = new Perso();
        $form = $this->createForm(PersoType::class, $perso);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $perso = $form->getData();

            $perso->setPuissance(random_int(6, 20));
            $perso->setVitesse(random_int(0, 10));
            $perso->setPdv(20);
            $perso->setDexterite(random_int(6, 20));
            $perso->setCharisme(random_int(6, 20));
            $perso->setIntelligence(random_int(6, 20));
            $perso->setConstitution(random_int(6, 20));
            $perso->setSagesse(random_int(6, 20));
            $perso->setUser($this->getUser());


            $place = $em->getRepository(Place::class)->find(2);
            $perso->setPace($place);

            $em->persist($perso);
            $em->flush();

            $this->addFlash(
                'success',
                'Personnage bien créé !'
            );

            return $this->redirectToRoute('app_perso_index');
        }

        return $this->render('perso/add.html.twig', [
            'form'  => $form->createView(),
        ]);
    }

    #[Route('/persos/{id}/edit', name: 'app_perso_edit')]
    public function edit(
        Perso $perso, 
        Request $request, 
        EntityManagerInterface $em
    ): Response
    {

        if ($perso->getUser() != $this->getUser()) {
            return $this->redirectToRoute('app_perso_index');
        }

        $form = $this->createForm(PersoType::class, $perso);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $perso = $form->getData();

            $em->persist($perso);
            $em->flush();

            $this->addFlash(
                'success',
                'Personnage bien modifié !'
            );

            return $this->redirectToRoute('app_perso_index');
        }

        return $this->render('perso/edit.html.twig', [
            'form'  => $form->createView(),
        ]);
    }

    #[Route('/persos/{id}/delete', name: 'app_perso_delete')]
    public function delete(
        Perso $perso, 
        EntityManagerInterface $em
    ): Response
    {

        if ($perso->getUser() != $this->getUser()) {
            return $this->redirectToRoute('app_perso_index');
        }

        $em->remove($perso);
        $em->flush();

        $this->addFlash(
            'success',
            'Personnage bien supprimé !'
        );

        return $this->redirectToRoute('app_perso_index');
    }
}
