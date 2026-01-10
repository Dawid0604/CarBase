<?php

declare(strict_types=1);

use Pest\Laravel as laravel;
use App\Models\{
    CarBrand,
    CarGeneration,
    CarModel
};

describe('CarGenerationController tests', function () {

    describe('generations endpoint tests', function () {

        it('returns successful response', function () {
            // Arrange
            $slug = 'xyz-1';

            $brand = CarBrand::factory()->create();
            $model = CarModel::factory()->create([
                'brand_id' => $brand,
                'slug' => $slug
            ]);

            CarGeneration::factory()->create([
                'model_id' => $model
            ]);

            // Act
            $response = laravel\get(route('car.generation.list', ['slug' => $slug]));

            // Assert
            $response->assertOk();
            $response->assertViewIs('car.generation-list');
            $response->assertViewHas('model.name', $model->name);
            $response->assertViewHas('model.slug', $model->slug);
            $response->assertViewHas('brand.name', $brand->name);
            $response->assertViewHas('brand.slug', $brand->slug);
            $response->assertViewHas('generations');
        });
    });
});
