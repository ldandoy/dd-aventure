<?php

    namespace App\Service;

    use App\Entity\PlaceStory;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\RequestStack;

    class PlaceStoryService
    {
        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em
        ) {
        }

        public function getRandPlaceStory($place): ?PlaceStory
        {
            $placeStory = $this->em->getRepository(PlaceStory::class)->getRandStory($place);
            
            return $placeStory;
        }
    }