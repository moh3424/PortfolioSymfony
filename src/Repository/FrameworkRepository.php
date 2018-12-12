<?php

namespace App\Repository;

use App\Entity\Framework;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Framework|null find($id, $lockMode = null, $lockVersion = null)
 * @method Framework|null findOneBy(array $criteria, array $orderBy = null)
 * @method Framework[]    findAll()
 * @method Framework[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrameworkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Framework::class);
    }

    // /**
    //  * @return Framework[] Returns an array of Framework objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Framework
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
