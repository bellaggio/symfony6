<?php
namespace App\Core\UseCases;
use App\Core\Adapters\BookRespositoryInterface;

class GetBookHandler
{
    /**
     * @param BookRespositoryInterface $repository
     */
    public function __construct(protected BookRespositoryInterface $repository)
    {
    }

    /**
     * @return array
     */
    public function handle():array{
        return $this->repository->getBook();
    }
}