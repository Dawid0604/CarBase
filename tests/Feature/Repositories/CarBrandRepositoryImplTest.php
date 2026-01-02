<?php

declare(strict_types=1);

use App\Models\{CarBrand, Engine};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use App\Repositories\CarBrandRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

describe('CarBrandRepositoryImpl tests', function () {

    describe('findAll() tests', function () {

        it('returns brands with engines count', function () {
            // Arrange
            $brand1 = CarBrand::factory()->create();
            $brand2 = CarBrand::factory()->create();
            $brand3 = CarBrand::factory()->create();

            Engine::factory()
                ->count(3)
                ->create(['brand_id' => $brand1->id]);

            Engine::factory()
                ->count(2)
                ->create(['brand_id' => $brand2->id]);

            // Act
            $brands = findAll();

            // Assert
            expect($brands)->toHaveCount(3);

            expect(
                $brands
                    ->firstWhere('id', $brand1->id)
                    ->engines_count
            )->toBe(3);

            expect(
                $brands
                    ->firstWhere('id', $brand2->id)
                    ->engines_count
            )->toBe(2);

            expect(
                $brands
                    ->firstWhere('id', $brand3->id)
                    ->engines_count
            )->toBe(0);
        });

        it('returns brands ordered by name', function () {
            // Arrange
            $brand1 = CarBrand::factory()->create(['name' => 'Alfa Romeo']);
            $brand2 = CarBrand::factory()->create(['name' => 'Jaguar']);
            $brand3 = CarBrand::factory()->create(['name' => 'Cherry']);

            // Act
            $brands = findAll();

            // Assert
            expect(
                $brands
                    ->pluck('name')
                    ->toArray()
            )->toBe([
                $brand1->name,
                $brand3->name,
                $brand2->name
            ]);
        });

        it('returns empty collection when no data', function () {
            // Arrange
            // Act
            $brands = findAll();

            // Assert
            expect($brands)
                ->toBeInstanceOf(Collection::class)
                ->toBeEmpty();
        });

        function findAll(): Collection
        {
            return getRepository()->findAll();
        }
    });

    describe('findNameBySlug() tests', function () {

        it('returns name for valid slug', function () {
            // Arrange
            $slug = 'xyz-1';
            $brand = CarBrand::factory()->create(['slug' => $slug]);

            // Act
            $result = findNameBySlug($slug);

            // Assert
            expect($result)->toBe($brand->name);
        });

        it('throws exception for non-existent slug', function () {
            // Arrange
            $slug = '';
            CarBrand::factory()->create();

            // Act
            // Assert
            expect(fn() => findNameBySlug($slug))
                ->toThrow(ModelNotFoundException::class);
        });

        it('is case-insensitive', function () {
            // Arrange
            $modelSlug = 'xyz';
            $slug = 'XyZ';
            $brand = CarBrand::factory()->create(['slug' => $modelSlug]);

            // Act
            $result = findNameBySlug($slug);

            // Assert
            expect($result)->toBe($brand->name);
        });

        function findNameBySlug(string $slug): string
        {
            return getRepository()->findNameBySlug($slug);
        }
    });

    describe('findRandomEngines() tests', function () {

        it('returns requested number of rows', function () {
            // Arrange
            CarBrand::factory()
                ->count(5)
                ->create();

            $numberOfRows = 3;

            // Act
            $result = findRandomEngines('any-slug', $numberOfRows);

            // Assert
            expect($result)->toHaveCount($numberOfRows);
        });

        it('excludes brand with given slug', function () {
            // Arrange
            $numberOfRows = 3;
            $expectedNumberOfRows = $numberOfRows - 1;
            $slug = 'slug-1';

            CarBrand::factory()
                ->create(['slug' => $slug]);

            CarBrand::factory()
                ->count($expectedNumberOfRows)
                ->create();

            // Act
            $result = findRandomEngines($slug, $numberOfRows);

            // Assert
            expect($result)->toHaveCount($expectedNumberOfRows);

            $resultSlugs = $result
                ->pluck('slug')
                ->toArray();

            expect(in_array($slug, $resultSlugs))->toBeFalse();
        });

        it('return empty collection when numberOfRows is lower than 1', function (int $numberOfRows) {
            // Arrange
            // Act
            $result = findRandomEngines('any-slug', $numberOfRows);

            // Assert
            expect($result)
                ->toBeInstanceOf(Collection::class)
                ->toBeEmpty();
        })->with([
            [0],
            [-1]
        ]);

        function findRandomEngines(string $slug, int $numberOfRows): Collection
        {
            return getRepository()->findRandomEngines($slug, $numberOfRows);
        }
    });
});

function getRepository(): CarBrandRepository
{
    return App::make(CarBrandRepository::class);
}
