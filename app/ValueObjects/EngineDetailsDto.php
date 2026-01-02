<?php

declare(strict_types=1);

namespace App\ValueObjects;

use App\Models\Engine;

final readonly class EngineDetailsDto
{
    private function __construct(
        public string $name,
        public string $slug,
        public string $description,
        public array $technicalData,
        public array $stats,
        public array $rating,
        public array $brand
    ) {}

    public static function fromModel(Engine $engine): self
    {
        return new self(
            name: $engine->name,
            description: $engine->description,
            slug: $engine->slug,
            technicalData: [
                'advantages' => $engine->advantages,
                'disadvantages' => $engine->disadvantages,
                'lpg' => $engine->lpg->getTranslatedName(),
                'turbocharger' => $engine->turbocharger,
                'engine_layout' => $engine->engine_layout->getTranslatedName(),
                'valve_count' => $engine->valve_count,
                'injection_type' => $engine->injection_type->getTranslatedName(),
                'power' => $engine->power,
                'fuel_type' => $engine->fuel_type
            ],
            stats: [
                'number_of_views' => $engine->number_of_views
            ],
            rating: [
                'rating' => $engine->rating,
                'reliability' => $engine->reliability,
                'consumption' => $engine->consumption,
                'dynamic' => $engine->dynamic
            ],
            brand: [
                'slug' => $engine->brand->slug,
                'name' => $engine->brand->name,
                'logo' => $engine->brand->logo
            ]
        );
    }
}
