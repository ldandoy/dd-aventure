<?php

    namespace App\Service;

    use App\Entity\Perso;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\RequestStack;

    class PersoService
    {
        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em
        ) {
        }

        public function getPerso(): Perso
        {
            $request = $this->requestStack->getCurrentRequest();
            $session = $request->getSession();
            $perso = $this->em->getRepository(Perso::class)->find($session->get('perso')->getId());
            
            return $perso;
        }
    }