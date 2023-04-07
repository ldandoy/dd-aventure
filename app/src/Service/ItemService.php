<?php

    namespace App\Service;

    use App\Entity\Item;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\RequestStack;

    class ItemService
    {
        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em
        ) {
        }

        public function getRandItem($place): Item
        {
            $item = $this->em->getRepository(Item::class)->getRandItem($place);
            
            return $item;
        }
    }