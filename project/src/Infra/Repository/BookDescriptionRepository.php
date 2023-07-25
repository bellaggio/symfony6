<?php

namespace App\Infra\Repository;

use App\Core\Adapters\BookDescriptionRepositoryInterface;
use App\Infra\Entity\BookDescriptionEntity;
use App\Infra\Helper\SerializerTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookDescriptionEntity>
 *
 * @method BookDescriptionEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookDescriptionEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookDescriptionEntity[]    findAll()
 * @method BookDescriptionEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookDescriptionRepository extends ServiceEntityRepository implements BookDescriptionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookDescriptionEntity::class);
    }

    /**
     * @return BookDescriptionEntity[] Returns an array of BookDescriptionEntity objects
     */
    public function getBookDescription(int $bookId): array
    {
        return $this->findBy(['book'=> $bookId]);
    }
}
