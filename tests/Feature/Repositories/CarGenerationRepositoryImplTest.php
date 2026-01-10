<?php

declare(strict_types=1);

use Pest\Expectation;
use Illuminate\Support\Collection;
use App\Repositories\CarGenerationRepository;
use App\Models\{
    CarBrand,
    CarGeneration,
    CarModel
};

describe('CarGenerationRepositoryImpl tests', function () {

    describe('findAllByModel() tests', function () {

        it('returns collection', function () {
            // Arrange
            $modelSlug = 'model-slug-1';
            $brand = CarBrand::factory()->create();
            $model = CarModel::factory()->create([
                'slug' => $modelSlug,
                'brand_id' => $brand
            ]);

            CarGeneration::factory(3)->create([
                'model_id' => $model,
                'production_to' => 2026
            ]);

            // Act
            $result = getCarGenerationRepository()->findAllByModel($model->slug);

            // Assert
            expect($result)
                ->toBeInstanceOf(Collection::class)
                ->and($result->count())->toBe(3);

            expect($result)
                ->each(function (Expectation $item) use ($modelSlug) {
                    $item->toBeInstanceOf(CarGeneration::class);
                    $generation = $item->value;

                    expect($generation->slug)->not->toBeNull();
                    expect($generation->slug)->not->toBe('');

                    expect($generation->name)->not->toBeNull();
                    expect($generation->name)->not->toBe('');

                    expect($generation->production_from)->not->toBeNull();
                    expect($generation->production_to)->not->toBeNull();

                    expect($generation->image)->not->toBeNull();
                    expect($generation->image)->not->toBe('');

                    expect($generation->model)->not->toBeNull();
                    expect($generation->model->id)->not->toBeNull();
                    expect($generation->model->name)->not->toBeNull();
                    expect($generation->model->slug)->toBe($modelSlug);

                    expect($generation->model->brand)->not->toBeNull();
                    expect($generation->model->brand->id)->not->toBeNull();
                    expect($generation->model->brand->name)->not->toBeNull();
                    expect($generation->model->brand->slug)->not->toBeNull();
                });
        });

        it('returns empty collection', function () {
            // Act
            $slug = 'non-existent-slug';

            // Act
            $result = getCarGenerationRepository()->findAllByModel($slug);

            // Assert
            expect($result)
                ->toBeInstanceOf(Collection::class)
                ->toBeEmpty();
        });
    });

    function getCarGenerationRepository(): CarGenerationRepository
    {
        return App::make(CarGenerationRepository::class);
    }
});
