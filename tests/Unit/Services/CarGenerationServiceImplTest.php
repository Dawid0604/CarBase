<?php

use Illuminate\Support\Collection;
use App\Models\{
    CarBrand,
    CarGeneration,
    CarModel
};
use App\Services\CarGenerationServiceImpl;
use App\Repositories\CarGenerationRepository;
use App\ValueObjects\Generation\CarGenerationDto;

describe('CarGenerationServiceImplTest', function () {

    describe('findAllByModel() tests', function () {

        it('returns collection', function () {
            // Arrange
            $slug = 'slug-1';
            $brand = CarBrand::factory()->make();
            $model = CarModel::factory()
                ->make([
                    'brand_id' => $brand
                ])
                ->setRelation('brand', $brand);

            $data = [
                CarGeneration::factory()
                    ->make(['model_id' => $model])
                    ->setRelation('model', $model),

                CarGeneration::factory()
                    ->make(['model_id' => $model])
                    ->setRelation('model', $model),

                CarGeneration::factory()
                    ->make(['model_id' => $model])
                    ->setRelation('model', $model)
            ];

            $repository = Mockery::mock(CarGenerationRepository::class);
            $service = new CarGenerationServiceImpl($repository);

            $repository
                ->shouldReceive('findAllByModel')
                ->with($slug)
                ->once()
                ->andReturn(collect($data));

            // Act
            $result = $service->findAllByModel($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount(\count($data));
            expect($result)
                ->each
                ->toBeInstanceOf(CarGenerationDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $slug = 'slug-1';

            $repository = Mockery::mock(CarGenerationRepository::class);
            $service = new CarGenerationServiceImpl($repository);

            $repository
                ->shouldReceive('findAllByModel')
                ->with($slug)
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findAllByModel($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });
});
