<?php

declare(strict_types=1);

use Pest\Laravel as laravel;
use App\Models\{
    CarBrand,
    Engine,
    User
};
use App\ValueObjects\Engine\EngineDetailsDto;
use App\Services\{
    CarBrandService,
    EngineService
};

describe('EngineController tests', function (): void {

    describe('details endpoint tests', function (): void {
        it('returns successfully response when user is authenticated', function (): void {
            // Arrange
            $slug = 'xyz';
            $engineServiceMock = Mockery::mock(EngineService::class);
            $brandServiceMock = Mockery::mock(CarBrandService::class);

            $foundDetails = EngineDetailsDto::fromModel(Engine::factory()->create());
            $user = User::factory()->create();

            $engineServiceMock
                ->shouldReceive('findDetails')
                ->with($slug)
                ->once()
                ->andReturn($foundDetails);

            $engineServiceMock
                ->shouldReceive('incrementNumberOfViews')
                ->with($slug);

            App::instance(CarBrandService::class, $brandServiceMock);
            App::instance(EngineService::class, $engineServiceMock);

            // Act
            $response = laravel\actingAs($user)->get(
                route('engine.details', ['slug' => $slug])
            );

            // Assert
            $response->assertOk();
            $response->assertViewIs('engine.details');
            $response->assertViewHas('data');
        });

        it('returns successfully response when user is not authenticated', function (): void {
            // Arrange
            $slug = 'xyz';
            $engineServiceMock = Mockery::mock(EngineService::class);
            $brandServiceMock = Mockery::mock(CarBrandService::class);
            $foundDetails = EngineDetailsDto::fromModel(Engine::factory()->create());

            $engineServiceMock
                ->shouldReceive('findDetails')
                ->with($slug)
                ->once()
                ->andReturn($foundDetails);

            $engineServiceMock
                ->shouldNotReceive('incrementNumberOfViews');

            App::instance(CarBrandService::class, $brandServiceMock);
            App::instance(EngineService::class, $engineServiceMock);

            // Act
            $response = laravel\get(
                route('engine.details', ['slug' => $slug])
            );

            // Assert
            $response->assertOk();
            $response->assertViewIs('engine.details');
            $response->assertViewHas('data');
        });
    });

    describe('list enpoint tests', function (): void {
        it('returns successfully response', function (): void {
            // Arrange
            $slug = 'xyz-3';

            $brand = CarBrand::factory()->create([
                'slug' => $slug
            ]);

            Engine::factory(3)->create([
                'brand_id' => $brand
            ]);

            // Act
            $response = laravel\get(
                route('engine.list', ['slug' => $slug])
            );

            // Assert
            $response->assertOk();
            $response->assertViewIs('engine.list');
            $response->assertViewHas('engines');
            $response->assertViewHas('brand.name', $brand->name);
            $response->assertViewHas('otherBrands');
        });
    });
});
