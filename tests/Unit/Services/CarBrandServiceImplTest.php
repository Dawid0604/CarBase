<?php

declare(strict_types=1);

use Tests\TestCase;
use App\Models\CarBrand;
use Illuminate\Support\Collection;
use App\Services\CarBrandServiceImpl;
use App\Repositories\CarBrandRepository;
use App\ValueObjects\Brand\{
    CarBrandEngineDto,
    CarBrandModelDto
};

describe('CarBrandServiceImpl tests', function () {

    describe('findAllWithEngines() tests', function () {

        it('returns collection', function () {
            // Arrange
            $data = collect([
                CarBrand::factory()->make(),
                CarBrand::factory()->make(),
                CarBrand::factory()->make()
            ]);

            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findAllWithEngines')
                ->once()
                ->andReturn($data);

            // Act
            $result = $service->findAllWithEngines();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)
                ->toHaveCount(\count($data))
                ->each
                ->toBeInstanceOf(CarBrandEngineDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findAllWithEngines')
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findAllWithEngines();

            // Assert
            expect($result)
                ->toBeInstanceOf(Collection::class)
                ->toBeEmpty();
        });
    });

    describe('findAllWithCarModels() tests', function () {

        it('returns collection', function () {
            // Arrange
            $data = collect([
                CarBrand::factory()->make(),
                CarBrand::factory()->make(),
                CarBrand::factory()->make()
            ]);

            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findAllWithCarModels')
                ->once()
                ->andReturn($data);

            // Act
            $result = $service->findAllWithCarModels();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)
                ->toHaveCount(\count($data))
                ->each
                ->toBeInstanceOf(CarBrandModelDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findAllWithCarModels')
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findAllWithCarModels();

            // Assert
            expect($result)
                ->toBeInstanceOf(Collection::class)
                ->toBeEmpty();
        });
    });

    describe('findNameBySlug() tests', function () {

        it('returns proper name', function () {
            // Arrange
            $slug = 'xyz-1';
            $name = 'xyz2';

            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findNameBySlug')
                ->with($slug)
                ->andReturn($name);

            // Act
            $result = $service->findNameBySlug($slug);

            // Assert
            expect($result)->toBe($name);
        });
    });

    describe('findRandomEngines() tests', function () {

        uses(TestCase::class);

        it('returns collection', function () {
            // Arrange
            $slug = 'xyz-1';
            $numberOfRows = 2;

            $data = collect([
                CarBrand::factory()->make(),
                CarBrand::factory()->make(),
                CarBrand::factory()->make()
            ]);

            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findRandomEngines')
                ->with($slug, $numberOfRows)
                ->andReturn($data);

            Config::set('pagination.engine_list_page.random_engines.items_per_page', $numberOfRows);

            // Act
            $result = $service->findRandomEngines($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)
                ->toHaveCount(\count($data))
                ->each
                ->toBeInstanceOf(CarBrandEngineDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $slug = 'xyz-1';
            $numberOfRows = 2;

            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findRandomEngines')
                ->with($slug, $numberOfRows)
                ->andReturn(new Collection());

            Config::set('pagination.engine_list_page.random_engines.items_per_page', $numberOfRows);

            // Act
            $result = $service->findRandomEngines($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });
});
