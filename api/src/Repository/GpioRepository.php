<?php

namespace App\Repository;

use App\Entity\Gpio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gpio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gpio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gpio[]    findAll()
 * @method Gpio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GpioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gpio::class);
    }

    // /**
    //  * @return Gpio[] Returns an array of Gpio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gpio
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
