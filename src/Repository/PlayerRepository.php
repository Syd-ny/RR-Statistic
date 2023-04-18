<?php

namespace App\Repository;

use App\Entity\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Query\Expr\Func;
use DoctrineExtensions\Query\Mysql\Power;

/**
 * @extends EntityRepository<Player>
 *
 * @method Player|null find($id, $lockMode = null, $lockVersion = null)
 * @method Player|null findOneBy(array $criteria, array $orderBy = null)
 * @method Player[]    findAll()
 * @method Player[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Player::class));
    }

    public function add(Player $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Player $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /** 
     * Trie les joueurs selon leur date de mise à jour, du plus récent au plus ancien.
     * 
     * IFNULL, permet d'ajouter une condition qui dit que si updatedAt est nul alors il prendra la veleure createdAt.
    */
    public function findAllOrderedByLastCreated()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('COALESCE(p.updatedAt, p.createdAt) as HIDDEN myDate')
            ->orderBy('myDate','DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trie les joueurs selon leur nom, A-Z.
     *
     */
    public function findAllOrderedByName()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.firstname','ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trie les joueurs selon leur rating en simple
     *
     */
    public function findAllOrderedBySingleRating()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('(p.ability + p.serve /2 + p.strenght /5 + p.speed /10 + p.mentality /10) as HIDDEN rating')
            ->orderBy('rating','DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trie les joueurs selon leur rating en double
     *
     */
    public function findAllOrderedByDoublesRating()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('(p.ability + p.serve /2 + p.strenght /5 + p.speed /10+ p.mentality /10 + p.doubles /2.5) as HIDDEN rating')
            ->orderBy('rating','DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trie les joueurs selon leur legacy score en simple.
     *
     */
    public function findAllOrderedBySingleLegacyScore()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('(p.atpSingleLow + p.atpSingleMid * 8 + p.atpSingleHigh * 25 + p.tmcSingle * 35 + p.gsSingle * 100 + p.weeksN1Single * 3) as HIDDEN score')
            ->orderBy('score','DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trie les joueurs selon leur legacy score en double.
     *
     */
    public function findAllOrderedByDoublesLegacyScore()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('(p.atpDoubleLow + p.atpDoubleMid * 8 + p.atpDoubleHigh * 25 + p.tmcDouble * 35 + p.gsDouble * 100 + p.weeksN1Double * 3) as HIDDEN score')
            ->orderBy('score','DESC')
            ->getQuery()
            ->getResult();
    }

    
    /**
     * Trie les joueurs selon leur legacy score global.
     *
     */
    public function findAllOrderedByGlobalLegacyScore()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('(p.atpSingleLow + p.atpSingleMid * 8 + p.atpSingleHigh * 25 + p.tmcSingle * 35 + p.gsSingle * 100 + p.weeksN1Single * 3) + (p.atpDoubleLow + p.atpDoubleMid * 8 + p.atpDoubleHigh * 25 + p.tmcDouble * 35 + p.gsDouble * 100 + p.weeksN1Double * 3) / 3.5 as HIDDEN global')
            ->orderBy('global','DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trie les joueurs selon leur potentiel
     *
     */
    public function findAllOrderedByPotentialSingle()
    {
    return $this->createQueryBuilder('p')
        ->select('(p.strength / ( p.actualAgeFactor / 100 )) / 5 as strength')
        ->addSelect('(p.speed / ( p.actualAgeFactor / 100 )) / 10 as speed')
        ->addSelect('POWER((p.endurance / (( p.actualAgeFactor / 100 ) * ( p.actualAgeFactor / 100))), 0.65) * 1.4 * 0.91 * 0.91 as endurance')
        ->addSelect('POWER(p.talent, 0.7) as talent')
        ->addSelect('(p.mentality / 10) as mentality')
        ->addSelect('strength + speed + endurance + talent + mentality as potential')
        ->orderBy('potential','DESC')
        ->setMaxResults(20)
        ->getQuery()
        ->getResult();
    }





//    /**
//     * @return Player[] Returns an array of Player objects
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

//    public function findOneBySomeField($value): ?Player
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
