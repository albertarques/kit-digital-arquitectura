<?php

namespace App\Repository;

use App\Entity\PostalAdress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostalAdress>
 *
 * @method PostalAdress|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostalAdress|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostalAdress[]    findAll()
 * @method PostalAdress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostalAdressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostalAdress::class);
    }

//    /**
//     * @return PostalAdress[] Returns an array of PostalAdress objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PostalAdress
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
