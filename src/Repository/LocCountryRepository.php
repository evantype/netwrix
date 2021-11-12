<?php

namespace App\Repository;

use App\Entity\LocCountry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocCountryRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocCountryRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocCountryRepository[]    findAll()
 * @method LocCountryRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocCountryRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, LocCountry::class);
	}

	// /**
	//  * @return LocCountry[] Returns an array of LocCountry objects
	//  */
	/*
	public function findByExampleField($value)
	{
		return $this->createQueryBuilder('c')
			->andWhere('c.exampleField = :val')
			->setParameter('val', $value)
			->orderBy('c.id', 'ASC')
			->setMaxResults(10)
			->getQuery()
			->getResult()
		;
	}
	*/

	/*
	public function findOneBySomeField($value): ?LocCountry
	{
		return $this->createQueryBuilder('c')
			->andWhere('c.exampleField = :val')
			->setParameter('val', $value)
			->getQuery()
			->getOneOrNullResult()
		;
	}
	*/
}
