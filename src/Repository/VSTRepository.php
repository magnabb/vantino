<?php declare(strict_types=1);

namespace App\Repository;

use App\Entity\VST;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VST|null find($id, $lockMode = null, $lockVersion = null)
 * @method VST|null findOneBy(array $criteria, array $orderBy = null)
 * @method VST[]    findAll()
 * @method VST[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VSTRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VST::class);
    }

    // /**
    //  * @return VST[] Returns an array of VST objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VST
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
