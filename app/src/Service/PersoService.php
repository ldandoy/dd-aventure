<?php

    namespace App\Service;

    use App\Entity\Perso;
    use App\Entity\Item;
    use App\Entity\User;
    use App\Entity\PersoItem;
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

        public function getUserPersos(User $user) : array
        {
            $persos = $this->em->getRepository(Perso::class)->findBy([
                'user' => $user
            ]);

            return $persos;
        }

        public function addItem(
            Perso $perso,
            Item $item
        ): void
        {
            $persoItem = $this->em->getRepository(PersoItem::class)->findOneBy([
                'perso' => $perso,
                'item' => $item,
            ]);

            // dd($persoItem);

            if ($persoItem) {
                $persoItem->setQte( $persoItem->getQte() + 1 );
            } else {
                $persoItem = new PersoItem();
                $persoItem->setPerso($perso);
                $persoItem->setItem($item);
                $persoItem->setQte(1);
            }

            $this->em->persist($persoItem);
            $this->em->flush();
        }

        public function removeItem(
            Perso $perso,
            Item $item
        ): void
        {
            // On récupère l'item du perso en bdd
            $persoItem = $this->em->getRepository(PersoItem::class)->findOneBy([
                'perso' => $perso,
                'item' => $item,
            ]);

            // On calcule la qte après avoir supprimer 1 item
            $qte = $persoItem->getQte() - 1;

            // S'il reste des items, on met juste à jour la qte, sinon on supprimer l'item
            if ($qte > 0) {
                $persoItem->setQte($qte);
                $this->em->persist($persoItem);
            } else {
                $this->em->remove($persoItem);
            }
            
            $this->em->flush();
        }

        public function addXP(Perso $perso, int $xp): void
        {
            $request = $this->requestStack->getCurrentRequest();
            $session = $request->getSession();
            
            $perso = $this->getPerso();
            $perso->setXp($perso->getXp() + $xp);
            
            $this->em->persist($perso);
            $this->em->flush();

            $session->set('perso', $perso);
        }
    }