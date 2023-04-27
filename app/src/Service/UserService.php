<?php

    namespace App\Service;

    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\HttpFoundation\RequestStack;
    use App\Entity\User;
    use App\Entity\Perso;

    class UserService
    {
        public function __construct(
            protected RequestStack $requestStack,
            protected EntityManagerInterface $em
        ) {
        }

        // Get the list of the persos of a given user
        public function getUserPersos(User $user) : array
        {
            $persos = $this->em->getRepository(Perso::class)->findBy([
                'user' => $user
            ]);

            return $persos;
        }
    }