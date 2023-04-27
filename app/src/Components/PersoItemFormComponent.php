<?php

namespace App\Components;

use App\Entity\PersoItem;
use App\Form\PersoItemType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\ComponentEmitsTrait;

#[AsLiveComponent('perso_item_form')]
class PersoItemFormComponent extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;
    use ComponentEmitsTrait;

    #[LiveProp(fieldName: 'data')]
    public ?PersoItem $persoItem = null;

    public function mount(PersoItem $persoItem = null)
    {
        $this->persoItem = $persoItem ?? null;
        // dump($this->persoItem);
    }

    #[LiveAction]
    public function save(EntityManagerInterface $em): void
    {
        $this->submitForm();

        $persoItem = $this->getFormInstance()->getData();

        $em->persist($persoItem);
        $em->flush();

        $this->emit('persoItemAdd');
        
        // return $this->redirectToRoute(('app_test_live'));
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(PersoItemType::class, $this->persoItem);
    }
}

