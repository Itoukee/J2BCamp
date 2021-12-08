<?php

namespace App\Repository;

use App\Entity\RoleHasPermission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoleHasPermission|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoleHasPermission|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoleHasPermission[]    findAll()
 * @method RoleHasPermission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleHasPermissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoleHasPermission::class);
    }

    // /**
    //  * @return RoleHasPermission[] Returns an array of RoleHasPermission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoleHasPermission
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
