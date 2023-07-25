<?php

namespace App\Infra\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class BaseRequest
{
    /**
     * @param ValidatorInterface $validator
     */
    public function __construct(protected ValidatorInterface $validator)
    {
        $this->populate();

        if ($this->autoValidateRequest()) {
            $this->validate();
        }
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public function validate(): ConstraintViolationListInterface
    {
        return $this->validator->validate($this);
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return Request::createFromGlobals();
    }

    /**
     * @return void
     */
    protected function populate(): void
    {
        foreach ($this->getRequest()->toArray() as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    protected function autoValidateRequest(): bool
    {
        return true;
    }
}
