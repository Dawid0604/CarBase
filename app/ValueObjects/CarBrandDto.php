<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\Models\CarBrand;
use InvalidArgumentException;

readonly class CarBrandDto
{
    private function __construct(
        public int $brandId,
        public string $name,
        public string $logo
    ) {
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be blank');
        }
    }

    public static function fromModel(CarBrand $model): self
    {
        return new self(
            brandId: $model->id,
            name: $model->name,
            logo: $model->logo
        );
    }
}
