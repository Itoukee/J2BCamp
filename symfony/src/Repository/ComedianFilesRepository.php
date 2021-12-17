<?php

namespace App\Repository;

use App\Entity\ComedianFiles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComedianFiles|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComedianFiles|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComedianFiles[]    findAll()
 * @method ComedianFiles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComedianFilesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComedianFiles::class);
    }

    // /**
    //  * @return ComedianFiles[] Returns an array of ComedianFiles objects
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
    public function findOneBySomeField($value): ?ComedianFiles
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
