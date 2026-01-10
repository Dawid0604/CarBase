<?php

declare(strict_types=1);

namespace App\ValueObjects\Engine;

use App\Models\Engine;

final readonly class EngineDto
{
    private function __construct(
        public string $name,
        public float $power,
        public string $fuelType,
        public array $brand,
        public array $stats,
        public string $slug
    ) {
    }

    public static function fromModel(Engine $model): self
    {
        return new self(
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
