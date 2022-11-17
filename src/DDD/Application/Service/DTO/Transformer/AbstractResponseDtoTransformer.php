<?php

declare(strict_types=1);

namespace App\DDD\Application\Service\DTO\Transformer;

/**
 * [Description AbstractResponseDtoTransformer]
 */
abstract class AbstractResponseDtoTransformer implements ResponseDtoTransformerInterface
{
    /**
     * @param iterable $objects
     * @param mixed $object2
     * 
     * @return iterable
     * 
     */
    public function transformComposeFromObjects(iterable $objects, $object2): iterable
    {
        $dtos = [];

        foreach ($objects as $object) {
            $dtos = $this->transformComposeFromObject($object, $object2);
        }

        return $dtos;
    }
}