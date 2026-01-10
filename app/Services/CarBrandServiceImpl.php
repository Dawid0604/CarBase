<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use App\Repositories\CarBrandRepository;
use App\ValueObjects\Brand\{
    CarBrandEngineDto,
    CarBrandModelDto
};

final class CarBrandServiceImpl implements CarBrandService
{
    public function __construct(private readonly CarBrandRepository $repository)
    {
    }

    #[Override]
    public function findAllWithEngines(): Collection
    {
        return $this
            ->repository
            ->findAllWithEngines()
            ->map(CarBrandEngineDto::fromModel(...));
    }

    #[Override]
    public function findAllWithCarModels(): Collection
    {
        return $this
            ->repository
            ->findAllWithCarModels()
            ->map(CarBrandModelDto::fromModel(...));
    }

    #[Override]
    public function findNameBySlug(string $slug): string
    {
        return $this
            ->repository
            ->findNameBySlug($slug);
    }

    #[Override]
    public function findRandomEngines(string $slug): Collection
    {
        $numberOfRows = Config::get('pagination.engine_list_page.random_engines.items_per_page', 0);

        return $this
            ->repository
            ->findRandomEngines($slug, $numberOfRows)
            ->map(CarBrandEngineDto::fromModel(...));
    }
}
