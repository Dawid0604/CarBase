<?php

declare(strict_types=1);

namespace App\ValueObjects;

use InvalidArgumentException;
use App\Models\{Engine, EngineFuelType};

readonly class EngineDto
{
    private function __construct(
        public int $engineId,
        public string $name,
        public float $power,
        public string $fuelType,
        public string $brandName,
        public string $brandLogo
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
            brandLogo: $model->brand->logo
        );
    }
}
