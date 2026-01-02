<?php

declare(strict_types=1);

use App\Models\{CarBrand, Engine};
use Illuminate\Support\Collection;
use App\Repositories\EngineRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

describe('EngineRepository tests', function () {

    describe('findNewest() tests', function () {

        it('limits number of rows', function () {
            // Arrange
            $numberOfRows = 3;
            $brand1 = CarBrand::factory()->create();
            $brand2 = CarBrand::factory()->create();

            Engine::factory(3)->create(['brand_id' => $brand1]);
            Engine::factory(2)->create(['brand_id' => $brand2]);

            // Override config
            Config::set('pagination.index_page.newest_engines.items_per_page', $numberOfRows);

            // Act
            $result = findNewest();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount($numberOfRows);
        });

        it('orders by id desc', function () {
            // Arrange
            $numberOfRows = 3;
            $brand1 = CarBrand::factory()->create();
            $brand2 = CarBrand::factory()->create();

            Engine::factory(3)->create(['brand_id' => $brand1]);
            Engine::factory(2)->create(['brand_id' => $brand2]);

            // Override config
            Config::set('pagination.index_page.newest_engines.items_per_page', $numberOfRows);

            // Act
            $result = findNewest();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);

            $resultIds = $result
                ->pluck('id')
                ->toArray();

            $sortedResultIds = collect($resultIds)
                ->sort()
                ->reverse()
                ->values()
                ->all();

            expect($resultIds)->toBe($sortedResultIds);
        });
    });

    describe('findPopular() tests', function () {

        it('limits number of rows', function () {
            // Arrange
            $numberOfRows = 3;
            $brand1 = CarBrand::factory()->create();
            $brand2 = CarBrand::factory()->create();

            Engine::factory(3)->create(['brand_id' => $brand1]);
            Engine::factory(2)->create(['brand_id' => $brand2]);

            // Override config
            Config::set('pagination.index_page.popular_engines.items_per_page', $numberOfRows);

            // Act
            $result = findPopular();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount($numberOfRows);
        });

        it('orders by number_of_views desc', function () {
            // Arrange
            $numberOfRows = 3;
            $brand1 = CarBrand::factory()->create();
            $brand2 = CarBrand::factory()->create();

            $engine1 = Engine::factory()->create([
                'name' => 'bbb',
                'number_of_views' => 432,
                'brand_id' => $brand1
            ]);

            $engine2 = Engine::factory()->create([
                'name' => 'aaa',
                'number_of_views' => $engine1->number_of_views,
                'brand_id' => $brand1
            ]);

            $engine3 = Engine::factory()->create([
                'name' => 'ddd',
                'number_of_views' => 1525,
                'brand_id' => $brand2
            ]);

            // Override config
            Config::set('pagination.index_page.popular_engines.items_per_page', $numberOfRows);

            // Act
            $result = findPopular();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);

            $expectedIds = [
                $engine3->id,
                $engine2->id,
                $engine1->id
            ];

            $resultIds = $result
                ->pluck('id')
                ->toArray();

            expect($resultIds)->toBe($expectedIds);
        });
    });

    describe('findDetails() tests', function () {

        it('returns details', function () {
            // Arrange
            $slug = 'xyz-1';
            $engine = Engine::factory()->create(['slug' => $slug]);

            // Act
            $result = findDetails($slug);

            // Assert
            expect($result)->toBeInstanceOf(Engine::class);
            expect($result->id)->toBe($engine->id);
            expect($result->brand)->not()->toBeNull();
            expect($result->slug)->toBe($engine->slug);
        });

        it('throws exception for non-existent slug', function () {
            // Arrange
            $slug = 'xyz-1';
            Engine::factory()->create();

            // Act
            // Assert
            expect(fn() => findDetails($slug))
                ->toThrow(ModelNotFoundException::class);
        });
    });

    describe('findAllByBrand() tests', function () {

        it('returns properly collection', function () {
            // Arrange
            $brandSlug = 'xyz-2';
            $brand = CarBrand::factory()->create(['slug' => $brandSlug]);

            $engine1 = Engine::factory()->create(['brand_id' => $brand]);
            $engine2 = Engine::factory()->create(['brand_id' => $brand]);

            // Act
            $result = findAllByBrand($brandSlug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);

            $resultIds = $result
                ->pluck('id')
                ->toArray();

            $expectedIds = [
                $engine1->id,
                $engine2->id
            ];

            expect($resultIds)->toBe($expectedIds);
        });

        it('returns sorted collection', function () {
            // Arrange
            $brandSlug = 'xyz-2';
            $brand = CarBrand::factory()->create(['slug' => $brandSlug]);

            $engine1 = Engine::factory()->create([
                'brand_id' => $brand,
                'name' => 'bbb'
            ]);

            $engine2 = Engine::factory()->create([
                'brand_id' => $brand,
                'name' => 'aaa'
            ]);

            // Act
            $result = findAllByBrand($brandSlug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);

            $resultIds = $result
                ->pluck('id')
                ->toArray();

            $expectedIds = [
                $engine2->id,
                $engine1->id
            ];

            expect($resultIds)->toBe($expectedIds);
        });
    });

    describe('incrementNumberOfViews() tests', function () {

        it('increments number_of_views successfully', function () {
            // Arrange
            $slug = 'xyz-1';
            $numberOfViews = 15;
            $engine = Engine::factory()->create([
                'number_of_views' => $numberOfViews,
                'slug' => $slug
            ]);

            Log::shouldReceive()
                ->never();

            // Act
            incrementNumberOfViews($slug);

            // Assert
            $foundEngine = Engine::whereId($engine->id)
                ->get('number_of_views')
                ->firstOrFail();

            expect($foundEngine->number_of_views)->toBe($engine->number_of_views + 1);
        });

        it('does not throws exception for non-existent slug', function () {
            // Arrange
            $slug = '?';

            Log::shouldReceive('warning')
                ->once()
                ->with(
                    'Attempted to increment number_of_views for non existent engine',
                    ['slug' => $slug]
                );

            // Act
            // Assert
            expect(fn() => incrementNumberOfViews($slug))
                ->not()
                ->toThrow(Error::class);
        });
    });

    function getEngineRepository(): EngineRepository
    {
        return App::make(EngineRepository::class);
    }

    function findPopular(): Collection
    {
        return getEngineRepository()->findPopular();
    }

    function findNewest(): Collection
    {
        return getEngineRepository()->findNewest();
    }

    function findDetails(string $slug): Engine
    {
        return getEngineRepository()->findDetails($slug);
    }

    function findAllByBrand(string $slug): Collection
    {
        return getEngineRepository()->findAllByBrand($slug);
    }

    function incrementNumberOfViews(string $slug): void
    {
        getEngineRepository()->incrementNumberOfViews($slug);
    }
});
