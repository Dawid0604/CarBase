<?php

declare(strict_types=1);

use App\Models\Engine;
use App\ValueObjects\EngineDetailsDto;

describe('EngineDetailsDto tests', function (): void {

    it('maps values properly', function (): void {
        // Arrange
        $model = Engine::factory()->create();

        // Act
        $result = EngineDetailsDto::fromModel($model);

        // Assert
        expect($result)
            ->toBeInstanceOf(EngineDetailsDto::class)
            ->and($result->name)->toBe($model->name)
            ->and($result->slug)->toBe($model->slug)
            ->and($result->description)->toBe($model->description)
            ->and($result->technicalData)->toMatchArray([
                'advantages' => $model->advantages,
                'disadvantages' => $model->disadvantages,
                'lpg' => $model->lpg->getTranslatedName(),
                'turbocharger' => $model->turbocharger,
                'engine_layout' => $model->engine_layout->getTranslatedName(),
                'valve_count' => $model->valve_count,
                'injection_type' => $model->injection_type->getTranslatedName(),
                'power' => $model->power,
                'fuel_type' => $model->fuel_type,
            ])
            ->and($result->stats)->toMatchArray([
                'number_of_views' => $model->number_of_views
            ])
            ->and($result->rating)->toMatchArray([
                'rating' => $model->rating,
                'reliability' => $model->reliability,
                'consumption' => $model->consumption,
                'dynamic' => $model->dynamic
            ])
            ->and($result->brand)->toMatchArray([
                'slug' => $model->brand->slug,
                'name' => $model->brand->name,
                'logo' => $model->brand->logo
            ]);
    });
});
