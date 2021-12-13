<?php

namespace App\Repository;

use App\Entity\Trainings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trainings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trainings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trainings[]    findAll()
 * @method Trainings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trainings::class);
    }
    // /**
    //  * @return Trainings[] Returns an array of Trainings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trainings
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
