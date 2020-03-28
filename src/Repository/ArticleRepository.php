<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Article[] an array of $count last Articles from the $from one
     */
	public function findLasts(int $count, int $from = 0) {
		return $this->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
			->setFirstResult($from)
			->setMaxResults($count)
			->getQuery()
			->getResult()
        ;
    }

    /**
     * @return int the number of articles in the DB
     */
	public function countAll() {
        return $this->createQueryBuilder('a')
            ->select('count(a)')
			->getQuery()
			->getSingleScalarResult()
        ;
    }
}
