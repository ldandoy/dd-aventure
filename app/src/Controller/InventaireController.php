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
        $perso = $persoService->getActivePerso();

        return $this->render('inventaire/index.html.twig', [
            'perso' => $perso
        ]);
    }

    #[Route('/inventaire/{item_id}/remove', name: 'app_inventaire_remove')]
    #[Entity('item', options: ['id' => 'item_id'])]
    public function remove(Item $item, PersoService $persoService, ItemService $itemService): Response
    {
        $perso = $persoService->getActivePerso();
        $persoService->removeItem($perso, $item);

        $this->addFlash(
            'success',
            'Item bien déposé !'
        );

        return $this->redirectToRoute('app_inventaire');
    }

    #[Route('/inventaire/{item_id}/use', name: 'app_inventaire_use')]
    #[Entity('item', options: ['id' => 'item_id'])]
    public function use(Item $item, PersoService $persoService, ItemService $itemService): Response
    {
        $persoService->useItem($item);

        $this->addFlash(
            'success',
            'Item bien utilisé !'
        );

        return $this->redirectToRoute('app_inventaire');
    }
}
