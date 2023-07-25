<?php

namespace tests\Core\UseCases;

use App\Core\UseCases\GetBookDescriptionHandler;
use App\Infra\Entity\BookDescriptionEntity;
use App\Infra\Repository\BookDescriptionRepository;
class GetBookDescriptionHandlerTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
    protected BookDescriptionRepository $bookDescriptionRepository;

    protected GetBookDescriptionHandler $getBookDescriptionHandler;

    public function setUp(): void
    {
        parent::setUp();

        $this->bookDescriptionRepository = $this->getMockBuilder(BookDescriptionRepository::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getBookDescription'])
            ->getMock();

        $this->getBookDescriptionHandler = new GetBookDescriptionHandler($this->bookDescriptionRepository);

    }

    public function testIfReturnBookDescription(){

        $book = new \App\Infra\Entity\BookEntity();
        $book->setId(10);
        $book->setPrice(20);
        $book->setTitle('Testing');

        $description = new BookDescriptionEntity();
        $description->setBook($book);
        $description->setId(3);
        $description->setDescription('Test description');

        $this->bookDescriptionRepository->method('getBookDescription')->willReturn([$description]);

        $result = $this->getBookDescriptionHandler->handle(3);

        $this->assertIsArray($result);
        $this->assertEquals(20, $result[0]->getBook()->getPrice());
        $this->assertEquals('Testing', $result[0]->getBook()->getTitle());
        $this->assertEquals(10, $result[0]->getBook()->getId());
        $this->assertEquals('Test description', $result[0]->getDescription());
    }

}