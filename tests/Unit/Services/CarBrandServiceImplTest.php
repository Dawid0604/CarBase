<?php

declare(strict_types=1);

use App\Models\CarBrand;
use App\ValueObjects\CarBrandDto;
use Illuminate\Support\Collection;
use App\Services\CarBrandServiceImpl;
use App\Repositories\CarBrandRepository;
use Tests\TestCase;

describe('CarBrandServiceImpl tests', function () {

    describe('findAll() tests', function () {

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
                ->shouldReceive('findAll')
                ->once()
                ->andReturn($data);

            // Act
            $result = $service->findAll();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)
                ->toHaveCount(\count($data))
                ->each
                ->toBeInstanceOf(CarBrandDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $repository = Mockery::mock(CarBrandRepository::class);
            $service = new CarBrandServiceImpl($repository);

            $repository
                ->shouldReceive('findAll')
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findAll();

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
                ->toBeInstanceOf(CarBrandDto::class);
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
