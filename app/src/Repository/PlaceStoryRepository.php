<?php

namespace App\Repository;

use App\Entity\PlaceStory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlaceStory>
 *
 * @method PlaceStory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaceStory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaceStory[]    findAll()
 * @method PlaceStory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaceStoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaceStory::class);
    }

    public function save(PlaceStory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlaceStory $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getRandStory($place): ?PlaceStory
    {
        return $this->createQueryBuilder('ps')
            ->andWhere('ps.place = :place_id')
            ->setParameter('place_id', $place->getId())
            ->orderBy('RAND()')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    /**
//     * @return PlaceStory[] Returns an array of PlaceStory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PlaceStory
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
