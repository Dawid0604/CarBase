<?php

declare(strict_types=1);

use App\Repositories\CarModelRepository;
use App\Models\{
    CarBrand,
    CarGeneration,
    CarModel
};
use Illuminate\Support\Collection;

describe('CarModelRepositoryImpl tests', function () {

    describe('findAllByBrand() tests', function () {

        it('returns collection', function () {
            // Arrange
            $brand = CarBrand::factory()->create();

            $model1 = CarModel::factory()->create(['brand_id' => $brand]);
            $model2 = CarModel::factory()->create(['brand_id' => $brand]);
            CarModel::factory()->create(['brand_id' => $brand]);

            CarGeneration::factory(2)->create([
                'model_id' => $model1,
            ]);

            CarGeneration::factory(1)->create([
                'model_id' => $model2,
            ]);

            // Act
            $result = getCarModelRepository()->findAllByBrand($brand->slug);

            // Assert
            expect($result)->toHaveCount(3);
            expect($result->first()->generations_count)->toBe(2);
            expect($result->get(1)->generations_count)->toBe(1);
            expect($result->last()->generations_count)->toBe(0);
        });

        it('return empty collection', function () {
            // Arrange
            $brand = CarBrand::factory()->create();

            // Act
            $result = getCarModelRepository()->findAllByBrand($brand->slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });

    function getCarModelRepository(): CarModelRepository
    {
        return App::make(CarModelRepository::class);
    }
});
