<?php

declare(strict_types=1);

use App\Models\CarModel;
use App\ValueObjects\Model\CarModelDto;

describe('CarModelDto tests', function (): void {

    it('maps values properly', function (?int $generationsCount, int $expectedGenerationsCount): void {
        // Arrange
        $model = CarModel::factory()->make();
        $model->setAttribute('generations_count', $generationsCount);

        // Act
        $result = CarModelDto::fromModel($model);

        // Assert
        expect($result)
            ->toBeInstanceOf(CarModelDto::class)
            ->and($result->name)->toBe($model->name)
            ->and($result->slug)->toBe($model->slug)
            ->and($result->numberOfGenerations)->toBe($expectedGenerationsCount);
    })->with([
                'when generations_count is not null' => [32, 32],
                'when generations_count is null' => [null, 0]
            ]);
});
