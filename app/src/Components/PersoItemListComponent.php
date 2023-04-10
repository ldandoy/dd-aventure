<?php

namespace App\Components;

use App\Entity\PersoItem;
use App\Form\PersoItemType;
use App\Repository\PersoItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveListener;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

#[AsLiveComponent('perso_item_list')]
class PersoItemListComponent extends AbstractController
{
    use DefaultActionTrait;

    public function __construct(private PersoItemRepository $persoItemRepository) {}

    #[LiveListener('persoItemAdd')]
    public function reloadPersoItems()
    {
        $this->getPersoItems();
    }

    public function getPersoItems(): array
    {
        return $this->persoItemRepository->findAll();
    }
}

