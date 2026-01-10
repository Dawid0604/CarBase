<?php

declare(strict_types=1);

use App\ValueObjects\Generation\CarGenerationDto;
use App\Models\{
    CarBrand,
    CarGeneration,
    CarModel
};

describe('CarGenerationDto tests', function (): void {

    it('maps values properly', function (?int $productionTo, int|string $expectedProductionTo): void {
        // Arrange
        $brand = CarBrand::factory()->make();
        $model = CarModel::factory()
            ->make(['brand_id' => $brand])
            ->setRelation('brand', $brand);

        $generation = CarGeneration::factory()
            ->make(['model_id' => $model])
            ->setRelation('model', $model);

        $generation->production_to = $productionTo;

        // Act
        $result = CarGenerationDto::fromModel($generation);

        // Assert
        expect($result)
            ->toBeInstanceOf(CarGenerationDto::class)
            ->and($result->slug)->toBe($generation->slug)
            ->and($result->image)->toBe($generation->image)
            ->and($result->productionFrom)->toBe($generation->production_from)
            ->and($result->productionTo)->toBe($expectedProductionTo)
            ->and($result->brand)->toMatchArray([
                    'slug' => $brand->slug,
                    'name' => $brand->name
                ])
            ->and($result->model)->toMatchArray([
                    'slug' => $model->slug,
                    'name' => $model->name
                ]);
    })->with([
                'present' => [null, 'obecnie'],
                'same date' => [2020, 2020],
            ]);
});
