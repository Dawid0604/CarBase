<?php

declare(strict_types=1);

use App\Models\Engine;
use App\ValueObjects\EngineListDto;

describe('EngineListDto tests', function (): void {

    it('maps values properly', function (): void {
        // Arrange
        $model = Engine::factory()->create();

        // Act
        $result = EngineListDto::fromModel($model);

        // Assert
        expect($result)
            ->toBeInstanceOf(EngineListDto::class)
            ->and($result->name)->toBe($model->name)
            ->and($result->slug)->toBe($model->slug)
            ->and($result->fuelType)->toBe($model->fuel_type);
    });
});
