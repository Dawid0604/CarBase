<?php

declare(strict_types=1);

use App\Models\{
    CarBrand,
    Engine
};
use Illuminate\Support\Collection;
use App\Services\EngineServiceImpl;
use App\Repositories\EngineRepository;
use App\ValueObjects\Engine\{
    EngineDetailsDto,
    EngineDto,
    EngineListDto
};

describe('EngineServiceImpl tests', function () {

    describe('findPopular() tests', function () {

        it('returns collection', function () {
            // Arrange
            $brand = CarBrand::factory()->make();

            $data = [
                Engine::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),

                Engine::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),

                Engine::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),
            ];

            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findPopular')
                ->once()
                ->andReturn(collect($data));

            // Act
            $result = $service->findPopular();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount(\count($data));
            expect($result)
                ->each
                ->toBeInstanceOf(EngineDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findPopular')
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findPopular();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });

    describe('findNewest() tests', function () {

        it('returns collection', function () {
            // Arrange
            $brand = CarBrand::factory()->make();

            $data = [
                Engine::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),

                Engine::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),

                Engine::factory()
                    ->make(['brand_id' => $brand])
                    ->setRelation('brand', $brand),
            ];

            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findNewest')
                ->once()
                ->andReturn(collect($data));

            // Act
            $result = $service->findNewest();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount(\count($data));
            expect($result)
                ->each
                ->toBeInstanceOf(EngineDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findNewest')
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findNewest();

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });

    describe('findDetails() tests', function () {

        it('returns details successfully', function () {
            // Arrange
            $slug = 'xyz';
            $brand = CarBrand::factory()->make();
            $engine = Engine::factory()
                ->make([
                    'brand_id' => $brand
                ])
                ->setRelation('brand', $brand);

            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findDetails')
                ->once()
                ->andReturn($engine);

            // Act
            $result = $service->findDetails($slug);

            // Assert
            expect($result)->toBeInstanceOf(EngineDetailsDto::class);
        });
    });

    describe('findAllByBrand() tests', function () {

        it('returns collection', function () {
            // Arrange
            $slug = 'xyz';
            $data = collect([
                Engine::factory()->make(['brand_id' => 1]),
                Engine::factory()->make(['brand_id' => 2]),
                Engine::factory()->make(['brand_id' => 3])
            ]);

            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findAllByBrand')
                ->once()
                ->andReturn($data);

            // Act
            $result = $service->findAllByBrand($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toHaveCount(\count($data));
            expect($result)
                ->each
                ->toBeInstanceOf(EngineListDto::class);
        });

        it('returns empty collection', function () {
            // Arrange
            $slug = 'xyz';

            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('findAllByBrand')
                ->once()
                ->andReturn(new Collection());

            // Act
            $result = $service->findAllByBrand($slug);

            // Assert
            expect($result)->toBeInstanceOf(Collection::class);
            expect($result)->toBeEmpty();
        });
    });

    describe('incrementNumberOfViews() tests', function () {

        it('increments value successfully', function () {
            // Arrange
            $slug = 'xyz';

            $repository = Mockery::mock(EngineRepository::class);
            $service = new EngineServiceImpl($repository);

            $repository
                ->shouldReceive('incrementNumberOfViews')
                ->with($slug)
                ->once();

            // Act
            // Assert
            expect(fn() => $service->incrementNumberOfViews($slug))
                ->not()->toThrow(Error::class);
        });
    });
});
