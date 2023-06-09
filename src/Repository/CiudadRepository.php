<?php

namespace App\Repository;

use App\Entity\Ciudad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ciudad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ciudad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ciudad[]    findAll()
 * @method Ciudad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CiudadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ciudad::class);
    }




    public function ciudad_provincia($id_user){

  
        $q= $this->getEntityManager()->createQueryBuilder();
        
        $q->select('c.id','c.nombre')
        ->from('App:ciudad','c')
        ->innerJoin('App:provincia','p',\Doctrine\ORM\Query\Expr\Join::WITH,'p=c.provincia')
        ->where('p.id=:user_id')
        ->setParameter('user_id',$id_user)
        ;
        dump($q->getQuery()->getResult());
      return $q->getQuery()->getResult();
    }

    // /**
    //  * @return Ciudad[] Returns an array of Ciudad objects
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
    public function findOneBySomeField($value): ?Ciudad
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
