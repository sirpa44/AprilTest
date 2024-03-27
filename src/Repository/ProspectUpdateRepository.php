<?php

namespace App\Repository;

use App\Entity\ProspectUpdate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProspectUpdate>
 *
 * @method ProspectUpdate|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProspectUpdate|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProspectUpdate[]    findAll()
 * @method ProspectUpdate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProspectUpdateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProspectUpdate::class);
    }

    //    /**
    //     * @return ProspectUpdate[] Returns an array of ProspectUpdate objects
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

    //    public function findOneBySomeField($value): ?ProspectUpdate
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
