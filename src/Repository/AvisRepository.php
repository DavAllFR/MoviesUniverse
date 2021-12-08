<?php

namespace App\Repository;

use App\Entity\Avis;
use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Avis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avis[]    findAll()
 * @method Avis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    public function countLikes(Film $film)
    {
        return $this->createQueryBuilder("avis")
            ->where("avis.film = :id AND avis.positif = true")
            ->setParameter("id", $film->getId())
            ->select("COUNT(avis.utilisateur)")
            ->getQuery()
            ->getResult();
    }

    public function countDislikes(Film $film)
    {
        return $this->createQueryBuilder("avis")
            ->where("avis.film = :id AND avis.positif = false")
            ->setParameter("id", $film->getId())
            ->select("COUNT(avis.utilisateur)")
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Avis[] Returns an array of Avis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Avis
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
