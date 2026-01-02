<?php

declare(strict_types=1);

use App\Models\CarBrand;
use App\ValueObjects\CarBrandDto;

describe('CarBrandDto tests', function (): void {

    it('maps values properly', function (?int $enginesCount, int $expectedEnginesCount): void {
        // Arrange
        $model = CarBrand::factory()->make();
        $model->engines_count = $enginesCount;

        // Act
        $result = CarBrandDto::fromModel($model);

        // Assert
        expect($result)
            ->toBeInstanceOf(CarBrandDto::class)
            ->and($result->name)->toBe($model->name)
            ->and($result->slug)->toBe($model->slug)
            ->and($result->logo)->toBe($model->logo)
            ->and($result->numberOfEngines)->toBe($expectedEnginesCount);
    })->with([
        'when engines_count is not null' => [32, 32],
        'when engines_count is null' => [null, 0]
    ]);
});
