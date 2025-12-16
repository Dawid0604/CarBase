<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\Models\Engine;
use InvalidArgumentException;

readonly class EngineDto
{
    private function __construct(
        public int $engineId,
        public string $name,
        public float $power,
        public string $fuelType,
        public string $brandName,
        public string $brandLogo,
        public int $numberOfViews,
        public int $likes,
        public int $dislikes
    ) {

        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be blank');
        }

        if (empty($brandName)) {
            throw new InvalidArgumentException('BrandName cannot be blank');
        }
    }

    public static function fromModel(Engine $model): self
    {
        return new self(
            engineId: $model->id,
            name: $model->name,
            power: $model->power,
            fuelType: $model->fuel_type->getTranslatedName(),
            brandName: $model->brand->name,
            brandLogo: $model->brand->logo,
            numberOfViews: $model->number_of_views,
            likes: $model->likes,
            dislikes: $model->dislikes
        );
    }
}
