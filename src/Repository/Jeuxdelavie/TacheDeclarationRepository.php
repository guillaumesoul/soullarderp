<?php

namespace App\Repository\Jeuxdelavie;

use App\Entity\Jeuxdelavie\TacheDeclaration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TacheDeclaration|null find($id, $lockMode = null, $lockVersion = null)
 * @method TacheDeclaration|null findOneBy(array $criteria, array $orderBy = null)
 * @method TacheDeclaration[]    findAll()
 * @method TacheDeclaration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TacheDeclarationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TacheDeclaration::class);
    }

    // /**
    //  * @return TacheDeclaration[] Returns an array of TacheDeclaration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TacheDeclaration
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
