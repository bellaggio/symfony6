<?php

namespace App\Infra\Controller;

use App\Core\UseCases\GetBookHandler;
use App\Infra\Helper\SerializerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GetBookController extends AbstractController
{
    use SerializerTrait;

    /**
     * @param GetBookHandler $bookHandler
     */
    public function __construct(protected GetBookHandler $bookHandler)
    {
    }

    #[Route('/get/book', name: 'app_get_book')]
        public function __invoke(SerializerInterface $serializer): JsonResponse
    {
        try {
            $books = $this->bookHandler->handle();
            return new JsonResponse($this->serialize($books, $serializer), 200, [], true);
        } catch (\Exception $exception) {
            return $this->json(["status" => "error", "message" => $exception->getMessage()]);
        }
    }
}
