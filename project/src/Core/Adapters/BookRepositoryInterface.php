<?php

namespace App\Core\Adapters;

interface BookRepositoryInterface
{
    public function getBook(int $id = null):array;
}