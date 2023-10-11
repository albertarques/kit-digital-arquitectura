<?php

namespace App\Repository;

use App\Entity\CameraRollType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CameraRollType>
 *
 * @method CameraRollType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CameraRollType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CameraRollType[]    findAll()
 * @method CameraRollType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CameraRollTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CameraRollType::class);
    }

//    /**
//     * @return CameraRollType[] Returns an array of CameraRollType objects
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

//    public function findOneBySomeField($value): ?CameraRollType
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
