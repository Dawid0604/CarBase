<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\Models\{Engine, EngineFuelType};

readonly class EngineListDto
{
    private function __construct(
        public string $name,
        public string $slug,
        public EngineFuelType $fuelType
    ) {}

    public static function fromModel(Engine $engine): self
    {
        return new self(
            name: $engine->name,
            slug: $engine->slug,
            fuelType: $engine->fuel_type
        );
    }
}
