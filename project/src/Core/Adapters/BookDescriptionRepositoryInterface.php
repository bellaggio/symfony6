<?php

namespace App\Core\Adapters;

interface BookDescriptionRepositoryInterface
{
    public function getBookDescription(int $bookId):array;
}