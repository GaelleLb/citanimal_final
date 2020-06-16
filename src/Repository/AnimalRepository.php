<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\ORM\Query;
use App\Entity\RechercheAnimal;
use App\Entity\RechercheEspece;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Animal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animal[]    findAll()
 * @method Animal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    /**
     * @return Query
     */
    public function findAllWithPagination(RechercheAnimal $search) : Query{
        
        $query = $this
        ->createQueryBuilder('a')
        ->orderBy('a.nom', 'ASC');
        
        if(!is_null($search->getRace())){
            $query = $query
            ->andWhere('a.espece = :espece')
            ->setParameter(':espece',$search->getRace());
        }

        if(!is_null($search->getSexe())){
            $query = $query->andWhere('a.sexe = :sexe')
            ->setParameter(':sexe',$search->getSexe());
        }


        return $query->getQuery();
    }


    // /**
    //  * @return Animal[] Returns an array of Animal objects
    //  */
   /* public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }*/

    /*
    public function findOneBySomeField($value): ?Animal
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
