<?php

namespace App\Repository;

use App\Entity\FilmFavori;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FilmFavori|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmFavori|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmFavori[]    findAll()
 * @method FilmFavori[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmFavoriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilmFavori::class);
    }

    // /**
    //  * @return FilmFavori[] Returns an array of FilmFavori objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FilmFavori
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
