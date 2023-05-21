<?php

    namespace App\Service;

    use App\Entity\Perso;
    use App\Entity\Item;
    use App\Entity\User;
    use App\Entity\PersoItem;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\RequestStack;
    use Symfony\Component\Serializer\SerializerInterface;

    class PersoService
    {
        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em,
            protected SerializerInterface $serializer
        ) {}

        // Get the perso selected from the session
        public function getActivePerso(): Perso
        {
            $request = $this->requestStack->getCurrentRequest();
            $session = $request->getSession();
            
            $perso_id = $session->get('perso_id');
            $perso = $this->em->getRepository(Perso::class)->find($perso_id);
            
            return $perso;
        }

        // Save perso
        public function save(Perso $perso): void
        {
            $this->em->persist($perso);
            $this->em->flush();
        }

        // Set the current perso
        public function setCurrentPersoId(Perso $perso): void
        {
            $request = $this->requestStack->getCurrentRequest();
            $session = $request->getSession();

            $session->set('perso_id', $perso->getId());
        }

        // use a given item to the active user
        public function useItem(
            Item $item
        ): void
        {   
            $perso = $this->getActivePerso();

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

            switch($item->getName()) {
                case "Potion Simple":
                    $perso = $this->getActivePerso();
                    $perso->setPdv($perso->getPdv() + 5);

                    $this->em->persist($perso);
                    $this->em->flush();
                    break;
            }
        }

        // Remove item to the active user
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

        // Remove PDV to the active user
        public function removePdv(int $pdv): void
        {
            $perso = $this->getActivePerso();
            $perso->setPdv($perso->getPdv() - $pdv);
            
            $this->em->persist($perso);
            $this->em->flush();
        }

        // Add XP to the active user
        public function addXP(int $xp): void
        {
            $perso = $this->getActivePerso();
            $perso->setXp($perso->getXp() + $xp);
            
            $this->em->persist($perso);
            $this->em->flush();
        }

        /*

        // Get information of a perso which as the given id
        public function getPerso(int $perso_id): Perso
        {
            $perso = $this->em->getRepository(Perso::class)->find($perso_id);
            
            return $perso;
        }

        // Save the Perso
        public function save (
            Perso $perso
        ){
            $request = $this->requestStack->getCurrentRequest();
            $session = $request->getSession();
            
            $json = $this->serializer->serialize(
                $perso, 
                JsonEncoder::FORMAT, 
                [
                    AbstractNormalizer::GROUPS => 'perso_show'
                ]
            );

            $session->set('perso', $json);
        }
        */

        // Add item to the active user
        // TODO
        public function addItem(
            Item $item
        ): void
        {
            $perso = $this->getActivePerso();

            $persoItem = $this->em->getRepository(PersoItem::class)->findOneBy([
                'perso' => $perso,
                'item' => $item,
            ]);

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
    }