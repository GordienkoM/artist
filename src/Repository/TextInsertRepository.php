<?php

namespace App\Repository;

use App\Entity\TextInsert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TextInsert>
 *
 * @method TextInsert|null find($id, $lockMode = null, $lockVersion = null)
 * @method TextInsert|null findOneBy(array $criteria, array $orderBy = null)
 * @method TextInsert[]    findAll()
 * @method TextInsert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextInsertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TextInsert::class);
    }

//    /**
//     * @return TextInsert[] Returns an array of TextInsert objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TextInsert
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
