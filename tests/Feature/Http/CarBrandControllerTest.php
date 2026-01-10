<?php

declare(strict_types=1);

use Pest\Laravel as laravel;

describe('CarBrandController tests', function () {

    describe('models endpoint tests', function () {

        it('return successful response', function () {
            // Arrange
            // Act
            $response = laravel\get(
                route('car.brand.list')
            );

            // Assert
            $response->assertOk();
            $response->assertViewIs('car.brand-list');
            $response->assertViewHas('brands');
        });
    });

    describe('engines endpoint tests', function () {

        it('return successful response', function () {
            // Arrange
            // Act
            $response = laravel\get(
                route('engine.brand.list')
            );

            // Assert
            $response->assertOk();
            $response->assertViewIs('engine.brand-list');
            $response->assertViewHas('brands');
        });
    });
});
