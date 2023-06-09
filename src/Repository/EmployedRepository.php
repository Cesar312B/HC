<?php

namespace App\Repository;

use App\Entity\Employed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Employed|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employed|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employed[]    findAll()
 * @method Employed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employed::class);
    }

    // /**
    //  * @return Employed[] Returns an array of Employed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Employed
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
