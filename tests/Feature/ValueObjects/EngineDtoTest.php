<?php

declare(strict_types=1);

use App\Models\Engine;
use App\ValueObjects\EngineDto;

describe('EngineDto tests', function (): void {

    it('maps values properly', function (): void {
        // Arrange
        $model = Engine::factory()->create();

        // Act
        $result = EngineDto::fromModel($model);

        // Assert
        expect($result)
            ->toBeInstanceOf(EngineDto::class)
            ->and($result->name)->toBe($model->name)
            ->and($result->slug)->toBe($model->slug)
            ->and($result->fuelType)->toBe($model->fuel_type->getTranslatedName())
            ->and($result->stats)->toMatchArray([
                'number_of_views' => $model->number_of_views
            ])
            ->and($result->brand)->toMatchArray([
                'name' => $model->brand->name,
                'logo' => $model->brand->logo
            ]);
    });
});
