<?php

namespace App\Repository;

use App\Entity\LocState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocStateRepository|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocStateRepository|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocStateRepository[]    findAll()
 * @method LocStateRepository[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocStateRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, LocState::class);
	}

	// /**
	//  * @return LocState[] Returns an array of LocState objects
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
	public function findOneBySomeField($value): ?LocState
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
