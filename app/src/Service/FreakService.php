<?php

    namespace App\Service;

    use App\Entity\Freak;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\RequestStack;

    class FreakService
    {
        private Request $request;
        private $session;

        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em
        ) {
            $this->request = $this->requestStack->getCurrentRequest();
            $this->session = $this->request->getSession();
        }

        public function getRandFreak(): ?Freak
        {
            $freak = $this->em->getRepository(Freak::class)->getRandFreak();
            
            return $freak;
        }

        public function removePDV(int $pdv):void
        {
            $this->session->get('fight')->freak->setPdv($this->session->get('fight')->freak->getPdv() - $pdv);
        }
    }