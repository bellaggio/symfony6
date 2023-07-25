<?php

namespace App\Infra\Request;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
class BookDescriptionRequest extends BaseRequest
{
    #[Type('integer')]
    #[NotBlank()]
    protected readonly int $bookId;
}