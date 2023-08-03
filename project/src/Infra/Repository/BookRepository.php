<?php

namespace App\Infra\Repository;

use App\Core\Adapters\BookRespositoryInterface;
use App\Infra\Entity\BookEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookEntity>
 *
 * @method BookEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookEntity[]    findAll()
 * @method BookEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository implements BookRespositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookEntity::class);
    }

    /**
     * @return BookEntity[] Returns an array of BookEntity objects
     */
    public function getBook(?int $id = null): array
    {
        return $this->findBy([], array('title' => 'ASC'));
    }
}
