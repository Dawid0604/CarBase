<?php

declare(strict_types=1);

namespace App\ValueObjects\Brand;

use App\Models\CarBrand;

final readonly class CarBrandEngineDto extends AbstractCarBrandDto
{
    private function __construct(
        public string $name,
        public string $logo,
        public string $slug,
        public int $numberOfEngines
    ) {
    }

    public static function fromModel(CarBrand $model): self
    {
        return new self(
            name: $model->name,
            logo: $model->logo,
            slug: $model->slug,
            numberOfEngines: $model->engines_count ?? 0
        );
    }
}
