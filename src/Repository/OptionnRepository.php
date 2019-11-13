<?php

namespace App\Repository;

use App\Entity\Optionn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Optionn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optionn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optionn[]    findAll()
 * @method Optionn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optionn::class);
    }

    // /**
    //  * @return Optionn[] Returns an array of Option objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Optionn
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
