<?php

namespace App\Repository;

use App\Entity\TypeActeurMedical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeActeurMedical>
 *
 * @method TypeActeurMedical|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeActeurMedical|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeActeurMedical[]    findAll()
 * @method TypeActeurMedical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeActeurMedicalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeActeurMedical::class);
    }

    public function save(TypeActeurMedical $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TypeActeurMedical $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TypeActeurMedical[] Returns an array of TypeActeurMedical objects
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

//    public function findOneBySomeField($value): ?TypeActeurMedical
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
