<?php

namespace App\Infra\Controller;

use App\Core\UseCases\GetBookDescriptionHandler;
use App\Infra\Helper\SerializerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GetBookDescriptionController extends AbstractController
{
    use SerializerTrait;

    public function __construct(protected GetBookDescriptionHandler $bookDescriptionHandler)
    {
    }

    #[Route('/get/description/{id}', name: 'app_get_book_description')]
    public function __invoke($id,SerializerInterface $serializer): JsonResponse
    {
        try{
            $data =$this->bookDescriptionHandler->handle($id);
            return new JsonResponse($this->serialize($data, $serializer), 200, [], true);
        }catch (\Exception $exception){
            return $this->json([ 'status' => 'error','message' => $exception->getMessage()]);
        }
    }
}
