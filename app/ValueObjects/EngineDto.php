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
        public array $brand,
        public array $stats,
        public string $slug
    ) {

        if (empty($name)) {
            throw new InvalidArgumentException('Name cannot be blank');
        }

        if (empty($brand)) {
            throw new InvalidArgumentException('Brand cannot be empty array');
        }

        if(empty($brand['name'])) {
            throw new InvalidArgumentException('Brand name cannot be empty');
        }

        if (empty($slug)) {
            throw new InvalidArgumentException('Slug cannot be blank');
        }
    }

    public static function fromModel(Engine $model): self
    {
        return new self(
            engineId: $model->id,
            name: $model->name,
            power: $model->power,
            fuelType: $model->fuel_type->getTranslatedName(),
            slug: $model->slug,
            brand: [
                'name' => $model->brand->name,
                'logo' => $model->brand->logo
            ],
            stats: [
                'number_of_views' => $model->number_of_views,
                'likes' => $model->likes,
                'dislikes' => $model->dislikes
            ]
        );
    }
}
