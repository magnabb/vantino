<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\TMSG;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TMSG|null find($id, $lockMode = null, $lockVersion = null)
 * @method TMSG|null findOneBy(array $criteria, array $orderBy = null)
 * @method TMSG[]    findAll()
 * @method TMSG[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TMSGRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TMSG::class);
    }

    // /**
    //  * @return TMSG[] Returns an array of TMSG objects
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
    public function findOneBySomeField($value): ?TMSG
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
