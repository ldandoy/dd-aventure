<?php

namespace App\Components;

use App\Entity\Perso;
use App\Service\PersoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('perso_show')]
class PersoShowComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp]
    public Perso $perso;

    public function __construct(
        private PersoService $persoService,
    ){
        $this->perso = $persoService->getActivePerso();
    }

}