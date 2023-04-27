<?php

namespace App\Components;

use App\Entity\Freak;
use App\Service\FightService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\Component\HttpFoundation\RequestStack;

#[AsLiveComponent('freak_show')]
class FreakShowComponent extends AbstractController
{
    use DefaultActionTrait;

    #[LiveProp]
    public Freak $freak;

    public function __construct(
        private FightService $fightService,
    ){
        // dd($fightService->getFight());
        $this->freak = $fightService->getFight()->freak;
    }

}