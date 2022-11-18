<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\CarMake;
use ContainerRZ3xMrx\getCarMake2Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\Query\QueryException;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use function PHPUnit\Framework\throwException;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }



    public function findOneCar($value)
    {
        $query = $this->createQueryBuilder('t')
            ->andWhere('t.id = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id','DESC');


            try {
                return $query
                    ->getQuery()
                    ->getOneOrNullResult();
            } catch (NonUniqueResultException $e) {
            throwException($e);
            }

    }

    #find car by search value
    public function findCarBySearch(string $value = null): QueryBuilder
    {
            $queryBuilder = $this->addfindBySearchQuerybuilder();

        if($value){
            $queryBuilder
            ->andwhere('t.title LIKE :val OR t.description LIKE :val OR cm.name LIKE :val')
                ->leftJoin('t.carmake', 'cm')
                ->setParameter('val','%' . $value . '%');

        }

        return $queryBuilder;

    }

    public function addFindBySearchQueryBuilder(QueryBuilder $queryBuilder = null): QueryBuilder
    {
        $queryBuilder = $queryBuilder ?? $this->createQueryBuilder('t');

        return $queryBuilder->orderBy('t.id', 'DESC');

    }

//    /**
//     * @return Car[] Returns an array of Car objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Car
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
