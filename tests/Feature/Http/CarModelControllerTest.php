<?php

declare(strict_types=1);

use App\Models\CarBrand;
use Pest\Laravel as laravel;

describe('CarModelController tests', function () {

    describe('models endpoint tests', function () {

        it('return successful response', function () {
            // Arrange
            $slug = 'xyz';
            $brandName = 'xyz2';

            CarBrand::factory()->create([
                'slug' => $slug,
                'name' => $brandName,
            ]);

            // Act
            $response = laravel\get(
                route('car.model.list', ['slug' => $slug])
            );

            // Assert
            $response->assertOk();
            $response->assertViewIs('car.model-list');
            $response->assertViewHas('brand.name', $brandName);
            $response->assertViewHas('brand.slug', $slug);
            $response->assertViewHas('models');
        });
    });
});
