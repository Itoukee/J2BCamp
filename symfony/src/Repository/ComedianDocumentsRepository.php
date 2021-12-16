<?php

namespace App\Repository;

use App\Entity\ComedianDocuments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComedianDocuments|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComedianDocuments|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComedianDocuments[]    findAll()
 * @method ComedianDocuments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComedianDocumentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComedianDocuments::class);
    }

    // /**
    //  * @return ComedianDocuments[] Returns an array of ComedianDocuments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ComedianDocuments
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
