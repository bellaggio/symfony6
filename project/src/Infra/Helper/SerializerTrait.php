<?php

namespace App\Infra\Helper;

use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

trait SerializerTrait
{
    /**
     * @param $data
     * @param SerializerInterface $serializer
     * @return string
     */
    public function serialize($data, SerializerInterface $serializer):string
    {
        return $serializer->serialize($data, 'json', [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                return $object->getId();
            },
        ]);
    }
}