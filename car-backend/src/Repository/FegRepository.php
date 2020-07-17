<?php

namespace App\Repository;

use App\Entity\Feg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Feg|null find($id, $lockMode = null, $lockVersion = null)
 * @method Feg|null findOneBy(array $criteria, array $orderBy = null)
 * @method Feg[]    findAll()
 * @method Feg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FegRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Feg::class);
    }

    // /**
    //  * @return Feg[] Returns an array of Feg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Feg
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
