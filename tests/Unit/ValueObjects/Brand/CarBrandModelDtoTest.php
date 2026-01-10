<?php

declare(strict_types=1);

use App\Models\CarBrand;
use App\ValueObjects\Brand\CarBrandModelDto;

describe('CarBrandModelDto tests', function (): void {

    it('maps values properly', function (?int $modelsCount, int $expectedModelsCount): void {
        // Arrange
        $model = CarBrand::factory()->make();
        $model->setAttribute('models_count', $modelsCount);

        // Act
        $result = CarBrandModelDto::fromModel($model);

        // Assert
        expect($result)
            ->toBeInstanceOf(CarBrandModelDto::class)
            ->and($result->name)->toBe($model->name)
            ->and($result->slug)->toBe($model->slug)
            ->and($result->logo)->toBe($model->logo)
            ->and($result->numberOfModels)->toBe($expectedModelsCount);
    })->with([
        'when models_count is not null' => [32, 32],
        'when models_count is null' => [null, 0]
    ]);
});
