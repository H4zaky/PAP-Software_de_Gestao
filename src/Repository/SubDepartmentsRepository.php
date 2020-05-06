<?php

namespace App\Repository;

use App\Entity\SubDepartments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SubDepartments|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubDepartments|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubDepartments[]    findAll()
 * @method SubDepartments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubDepartmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubDepartments::class);
    }

    // /**
    //  * @return SubDepartments[] Returns an array of SubDepartments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubDepartments
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
