<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\Models\CarBrand;
use InvalidArgumentException;

readonly class CarBrandDto
{
    private function __construct(
        public string $name,
        public string $logo,
        public string $slug,
        public int $numberOfEngines
    ) {
        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be blank');
        }

        if (empty($slug)) {
            throw new InvalidArgumentException('Slug cannot be blank');
        }

        if($numberOfEngines < 0) {
            throw new InvalidArgumentException('Number of engines cannot be lower than 0');

        }
    }

    public static function fromModel(CarBrand $model): self
    {
        return new self(
            name: $model->name,
            logo: $model->logo,
            slug: $model->slug,
            numberOfEngines: $model->engines_count
        );
    }
}
