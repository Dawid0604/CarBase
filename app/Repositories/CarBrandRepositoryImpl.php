<?php

declare(strict_types=1);

namespace App\Repositories;

use Override;
use App\Models\CarBrand;
use Illuminate\Support\Collection;

final class CarBrandRepositoryImpl implements CarBrandRepository
{
    #[Override]
    public function findAllWithEngines(): Collection
    {
        return CarBrand::withCount('engines')
            ->orderByName()
            ->get();
    }

    #[Override]
    public function findAllWithCarModels(): Collection
    {
        return CarBrand::withCount('models')
            ->orderByName()
            ->get();
    }

    #[Override]
    public function findNameBySlug(string $slug): string
    {
        return CarBrand::findNameBySlug($slug)
            ->firstOrFail()
            ->name;
    }

    #[Override]
    public function findRandomEngines(string $slug, int $numberOfRows): Collection
    {
        if ($numberOfRows <= 0) {
            return new Collection();
        }

        $ids = CarBrand::pluck('id')->toArray();

        if (empty($ids)) {
            return new Collection();
        }

        $fixedNumberOfRows = \min($numberOfRows, \count($ids));
        $randomIds = \array_rand(\array_flip($ids), $fixedNumberOfRows);
        $randomIds = \is_array($randomIds) ? $randomIds : [$randomIds];

        return CarBrand::whereIn('id', $randomIds)
            ->whereSlugIsNotEqual($slug)
            ->get();
    }
}
