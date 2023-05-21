<?php

    namespace App\Service;

    use App\Entity\Place;
    use Doctrine\ORM\EntityManagerInterface;

    class PlaceService
    {
        public function __construct(
            protected EntityManagerInterface $em
        ) {}

        public function getPlaceById(int $id): ?Place
        {
            $place = $this->em->getRepository(Place::class)->find($id);
            
            return $place;
        }
    }