<?php

namespace tests\Core\UseCases;

use App\Core\UseCases\GetBookHandler;
use App\Infra\Repository\BookRepository;

class GetBookHandlerTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
    /**
     * @var BookRepository|(BookRepository&\PHPUnit\Framework\MockObject\MockObject)|\PHPUnit\Framework\MockObject\MockObject
     */
    protected BookRepository $bookRepository;

    protected GetBookHandler $getBookHandler;

    public function setUp(): void
    {
        parent::setUp();

        $this->bookRepository = $this->getMockBuilder(BookRepository::class)
            ->onlyMethods(['getBook'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->getBookHandler = new GetBookHandler($this->bookRepository);
    }

    public function testIfHandlerReturnListOfBookCorrectly()
    {

        $book = new \App\Infra\Entity\BookEntity();
        $book->setId(10);
        $book->setPrice(20);
        $book->setTitle('Testing');

        $this->bookRepository->method('getBook')->willReturn(
            [$book]
        );

        $result = $this->getBookHandler->handle();
        $this->assertIsArray($result);
        $this->assertEquals($book->getPrice(), $result[0]->getPrice());
    }
}