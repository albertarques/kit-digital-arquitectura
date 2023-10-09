<?php

namespace App\Repository;

use App\Entity\CameraRoll;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CameraRoll>
 *
 * @method CameraRoll|null find($id, $lockMode = null, $lockVersion = null)
 * @method CameraRoll|null findOneBy(array $criteria, array $orderBy = null)
 * @method CameraRoll[]    findAll()
 * @method CameraRoll[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CameraRollRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CameraRoll::class);
    }

//    /**
//     * @return CameraRoll[] Returns an array of CameraRoll objects
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

//    public function findOneBySomeField($value): ?CameraRoll
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
