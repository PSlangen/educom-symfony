<?php

namespace App\Repository;

use App\Entity\Voorprogramma;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Voorprogramma>
 *
 * @method Voorprogramma|null find($id, $lockMode = null, $lockVersion = null)
 * @method Voorprogramma|null findOneBy(array $criteria, array $orderBy = null)
 * @method Voorprogramma[]    findAll()
 * @method Voorprogramma[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoorprogrammaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Voorprogramma::class);
    }

    public function save(Voorprogramma $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Voorprogramma $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Voorprogramma[] Returns an array of Voorprogramma objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Voorprogramma
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
