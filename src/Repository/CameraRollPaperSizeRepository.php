<?php

namespace App\Repository;

use App\Entity\CameraRollPaperSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CameraRollPaperSize>
 *
 * @method CameraRollPaperSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method CameraRollPaperSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method CameraRollPaperSize[]    findAll()
 * @method CameraRollPaperSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CameraRollPaperSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CameraRollPaperSize::class);
    }

//    /**
//     * @return CameraRollPaperSize[] Returns an array of CameraRollPaperSize objects
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

//    public function findOneBySomeField($value): ?CameraRollPaperSize
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
