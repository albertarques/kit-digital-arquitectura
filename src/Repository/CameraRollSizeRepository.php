<?php

namespace App\Repository;

use App\Entity\CameraRollSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CameraRollSize>
 *
 * @method CameraRollSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method CameraRollSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method CameraRollSize[]    findAll()
 * @method CameraRollSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CameraRollSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CameraRollSize::class);
    }

//    /**
//     * @return CameraRollSize[] Returns an array of CameraRollSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CameraRollSize
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
