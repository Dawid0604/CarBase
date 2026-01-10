<?php

declare(strict_types=1);

namespace App\ValueObjects\Generation;

use App\Models\CarGeneration;

final readonly class CarGenerationDto
{
    private function __construct(
        public string $name,
        public string $slug,
        public ?string $image,
        public int $productionFrom,
        public int|string $productionTo,
        public array $brand,
        public array $model
    ) {
    }

    public static function fromModel(CarGeneration $model): self
    {
        return new self(
            name: $model->name,
            slug: $model->slug,
            image: $model->image,
            productionFrom: $model->production_from,
            productionTo: $model->production_to ?? 'obecnie',
            brand: [
                'name' => $model->model->brand->name,
                'slug' => $model->model->brand->slug
            ],
            model: [
                'name' => $model->model->name,
                'slug' => $model->model->slug
            ]
        );
    }
}
