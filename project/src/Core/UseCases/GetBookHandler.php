<?php
namespace App\Core\UseCases;
use App\Core\Adapters\BookRepositoryInterface;

class GetBookHandler
{
    /**
     * @param BookRepositoryInterface $repository
     */
    public function __construct(protected BookRepositoryInterface $repository)
    {
    }

    /**
     * @return array
     */
    public function handle():array
    {
        return $this->repository->getBook();
    }
}