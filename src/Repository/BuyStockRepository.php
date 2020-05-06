<?php

namespace App\Repository;

use App\Entity\BuyStock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BuyStock|null find($id, $lockMode = null, $lockVersion = null)
 * @method BuyStock|null findOneBy(array $criteria, array $orderBy = null)
 * @method BuyStock[]    findAll()
 * @method BuyStock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuyStockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BuyStock::class);
    }

    // /**
    //  * @return BuyStock[] Returns an array of BuyStock objects
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
    public function findOneBySomeField($value): ?BuyStock
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
