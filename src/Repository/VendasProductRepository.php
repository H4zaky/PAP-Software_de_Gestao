<?php

namespace App\Repository;

use App\Entity\VendasProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VendasProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method VendasProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method VendasProduct[]    findAll()
 * @method VendasProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendasProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VendasProduct::class);
    }

    // /**
    //  * @return Vendas[] Returns an array of Vendas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vendas
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
