<?php

use Illuminate\Support\Collection;
use App\Models\{
    CarBrand,
    CarModel
};
use App\Services\CarModelServiceImpl;
use App\Repositories\CarModelRepository;
use App\ValueObjects\Model\CarModelDto;

describe('CarModelServiceImplTest', function () {

    describe('findAllByBrand() tests', function () {

        it('returns collection', function () {
            // Arrange
            $slug = 'slug-1';
            $brand = CarBrand::factory()->make();

            $data = [
                CarModel::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),

                CarModel::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),

                CarModel::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand)
            ];

            $repository = Mockery::mock(CarModelRepository::class);
            $service = new CarModelServiceImpl($repository);

            $repository
                ->shouldReceive('findAllByBrand')
                ->with($slug)
                ->once()
                ->andReturn(collect($data));

            // Act
            $result = $service->findAllByBrand($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount(\count($data));
            expect($result)
                ->each
                ->toBeInstanceOf(CarModelDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $slug = 'slug-1';

            $repository = Mockery::mock(CarModelRepository::class);
            $service = new CarModelServiceImpl($repository);

            $repository
                ->shouldReceive('findAllByBrand')
                ->with($slug)
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findAllByBrand($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });
});
