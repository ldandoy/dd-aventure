<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\PersoService;
use App\Service\ItemService;
use App\Entity\Item;

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

    #[Route('/inventaire/{item_id}/remove', name: 'app_inventaire_remove')]
    #[Entity('item', options: ['id' => 'item_id'])]
    public function remove(Item $item, PersoService $persoService, ItemService $itemService): Response
    {
        $perso = $persoService->getPerso();
        $persoService->removeItem($perso, $item);

        $this->addFlash(
            'success',
            'Item bien déposé !'
        );

        return $this->redirectToRoute('app_inventaire');
    }
}
