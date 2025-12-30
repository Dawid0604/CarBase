<?php

declare(strict_types=1);

use Pest\Laravel as laravel;
use App\Services\CarBrandService;
use Illuminate\Support\Collection;

describe('CarBrandController tests', function (): void {

    it('returns successfully response', function (): void {
        // Arrange
        $brandServiceMock = Mockery::mock(CarBrandService::class);

        $brandServiceMock
            ->shouldReceive('findAll')
            ->once()
            ->andReturn(new Collection());

        App::instance(CarBrandService::class, $brandServiceMock);

        // Act
        $response = laravel\get(route('brand.list'));

        // Assert
        $response->assertOk();
        $response->assertViewIs('brand.list');
        $response->assertViewHas('brands');
    });
});
