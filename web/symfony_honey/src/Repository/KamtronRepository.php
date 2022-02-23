<?php

namespace App\Repository;

use App\Entity\Kamtron;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kamtron|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kamtron|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kamtron[]    findAll()
 * @method Kamtron[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamtronRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kamtron::class);
    }

    // /**
    //  * @return Kamtron[] Returns an array of Kamtron objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kamtron
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
