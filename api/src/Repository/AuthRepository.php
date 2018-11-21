<?php

namespace App\Repository;

use App\Entity\Auth;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Auth|null find($id, $lockMode = null, $lockVersion = null)
 * @method Auth|null findOneBy(array $criteria, array $orderBy = null)
 * @method Auth[]    findAll()
 * @method Auth[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Auth::class);
    }

    // /**
    //  * @return Auth[] Returns an array of Auth objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Auth
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
