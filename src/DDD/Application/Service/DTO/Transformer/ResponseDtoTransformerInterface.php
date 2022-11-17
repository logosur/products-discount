<?php

declare(strict_types=1);

namespace App\DDD\Application\Service\DTO\Transformer;

use App\DDD\Infrastructure\Persistence\Entity\Product;
use App\DDD\Domain\Model\PriceModel;

interface ResponseDtoTransformerInterface
{
    public function transformComposeFromObject(Product $object1, PriceModel $object2);
    
    public function transformComposeFromObjects(iterable  $objects, PriceModel $object2): iterable;
}