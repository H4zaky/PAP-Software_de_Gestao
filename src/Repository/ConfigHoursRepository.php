<?php

namespace App\Repository;

use App\Entity\ConfigHours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ConfigHours|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigHours|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigHours[]    findAll()
 * @method ConfigHours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigHoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigHours::class);
    }

    // /**
    //  * @return ConfigHours[] Returns an array of ConfigHours objects
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
    public function findOneBySomeField($value): ?ConfigHours
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
