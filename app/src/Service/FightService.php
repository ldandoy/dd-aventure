<?php

    namespace App\Service;

    use App\Entity\Freak;
    use App\Entity\Perso;
    use App\Service\PersoService;
    use App\Service\FreakService;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\RequestStack;

    class FightService
    {
        private object $session;

        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em,
            protected PersoService $persoService,
            protected FreakService $freakService
        ) {
            $request = $this->requestStack->getCurrentRequest();
            $this->session = $request->getSession();
        }

        public function getFight(): ?object
        {
            return $this->session->get('fight');
        }

        public function startFight(Freak $freak): void
        {
            $fight = (object)[
                'perso' => $this->persoService->getActivePerso(),
                'freak' => $freak
            ];
            $this->session->set('fight', $fight);

            $this->makeFight();
        }

        public function makeFight(): void
        {
            if ($this->session->get('fight')->perso->getVitesse() >= $this->session->get('fight')->freak->getVitesse()) {
                $this->addStep($this->session->get('fight')->perso->getName() ." attaque en premier");
                $this->persoFight();
                $this->freakAtk();
            } else {
                $this->addStep($this->session->get('fight')->freak->getName() . " attaque en premier");
                $this->freakAtk();
                $this->persoFight();
            }
        }

        public function persoFight(): void
        {
            $atk = rand(0, 20);
            $pdv = rand(0, $this->session->get('fight')->perso->getPuissance());
            $this->addStep("Perso fait: " . $atk);

            if ($atk > $this->session->get('fight')->freak->getConstitution()) {
                $this->addStep('Vous avez touché ! freak perd ' . $pdv . ' pdv');

                $this->freakService->removePDV($pdv);
            } else {
                $this->addStep('Vous n\'avez pas touché !');
            }
        }

        public function freakAtk(): void
        {
            $atk = rand(0, 20);
            $pdv = rand(0, $this->session->get('fight')->freak->getPuissance());
            $this->addStep("Freak fait: " . $atk);

            if ($atk > $this->session->get('fight')->perso->getConstitution()) {
                $this->addStep('Vous êtes touché ! Vous perdez ' . $pdv . ' pdv');
                $this->persoService->removePdv($pdv);
            } else {
                $this->addStep('Vous n\'êtes pas touché !');
            }
        }

        public function endFight(bool $win = false): void
        {
            if ($win == true) {
                $this->persoService->addXP($this->session->get('fight')->freak->getXp());
            } else {
                $this->persoService->addXP(-$this->session->get('fight')->freak->getXp());
            }
            $this->session->remove('fight');
        }

        public function addStep(string $step): void
        {
            $steps = $this->session->get('steps');
            $steps[] = $step;
            ksort($steps);
            $this->session->set('steps', $steps);
        }

        public function getSteps(): array
        {
            return $this->session->get('steps');
        }

        public function clearSteps(): void
        {
            $this->session->remove('steps');
        }
    }