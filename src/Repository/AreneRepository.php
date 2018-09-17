<?php

namespace App\Repository;

use App\Entity\Arene;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Arene|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arene|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arene[]    findAll()
 * @method Arene[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AreneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Arene::class);
    }

//    /**
//     * @return Contact[] Returns an array of Contact objects
//     */
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
    public function findOneBySomeField($value): ?Contact
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
