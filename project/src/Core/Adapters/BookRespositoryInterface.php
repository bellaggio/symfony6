<?php

namespace App\Core\Adapters;

interface BookRespositoryInterface
{
    public function getBook(int $id = null):array;
}