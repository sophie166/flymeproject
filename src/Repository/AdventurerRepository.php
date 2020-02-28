<?php

namespace App\Repository;

use App\Entity\Adventurer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Adventurer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adventurer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adventurer[]    findAll()
 * @method Adventurer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdventurerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adventurer::class);
    }

    // /**
    //  * @return Adventurer[] Returns an array of Adventurer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Adventurer
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
