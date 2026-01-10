<?php

declare(strict_types=1);

use Pest\Laravel as laravel;
use Illuminate\Support\Collection;
use App\Services\{
    CarBrandService,
    EngineService
};

describe('HomeController tests', function (): void {

    it('returns successfully response', function (): void {
        // Arrange
        $brandServiceMock = Mockery::mock(CarBrandService::class);
        $engineServiceMock = Mockery::mock(EngineService::class);

        $brandServiceMock
            ->shouldReceive('findAllWithEngines')
            ->once()
            ->andReturn(new Collection());

        $engineServiceMock
            ->shouldReceive('findPopular')
            ->once()
            ->andReturn(new Collection());

        $engineServiceMock
            ->shouldReceive('findNewest')
            ->once()
            ->andReturn(new Collection());

        App::instance(CarBrandService::class, $brandServiceMock);
        App::instance(EngineService::class, $engineServiceMock);

        // Act
        $response = laravel\get(route('home'));

        // Assert
        $response->assertOk();
        $response->assertViewIs('home');
        $response->assertViewHas('brands');
        $response->assertViewHas('engines.popular');
        $response->assertViewHas('engines.newest');
    });
});
