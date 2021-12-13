<?php

namespace App\Repository;

use App\Entity\Bills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bills|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bills|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bills[]    findAll()
 * @method Bills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bills::class);
    }

    // /**
    //  * @return Bills[] Returns an array of Bills objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bills
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
