<?php

namespace App\Repository;

use App\Entity\Migration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Migration|null find($id, $lockMode = null, $lockVersion = null)
 * @method Migration|null findOneBy(array $criteria, array $orderBy = null)
 * @method Migration[]    findAll()
 * @method Migration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MigrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Migration::class);
    }

    // /**
    //  * @return Migration[] Returns an array of Migration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Migration
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
