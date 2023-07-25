<?php

namespace App\Core\UseCases;

use App\Core\Adapters\BookDescriptionRepositoryInterface;

class GetBookDescriptionHandler
{
    /**
     * @param BookDescriptionRepositoryInterface $repository
     */
    public function __construct(protected BookDescriptionRepositoryInterface $repository)
    {
    }

    /**
     * @param int $bookId
     * @return array
     */
    public function handle(int $bookId):array{
        return $this->repository->getBookDescription($bookId);
    }
}