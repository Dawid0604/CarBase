<?php

declare(strict_types=1);

namespace App\ValueObjects\Model;

use App\Models\CarModel;

final readonly class CarModelDto
{
    public function __construct(
        public string $name,
        public string $slug,
        public int $numberOfGenerations
    ) {
    }

    public static function fromModel(CarModel $model): self
    {
        return new self(
            name: $model->name,
            slug: $model->slug,
            numberOfGenerations: $model->generations_count ?? 0
        );
    }
}
