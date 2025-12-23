<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CarBrand;
use Illuminate\Support\Collection;
use Override;

final class CarBrandRepositoryImpl implements CarBrandRepository
{
    #[Override]
    public function findAll(): Collection
    {
        return CarBrand::findAll()->get();
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
        $ids = CarBrand::pluck('id')->toArray();

        if (\count($ids) <= $numberOfRows) {
            return CarBrand::whereSlugIsNotEqual($slug)
                ->get();
        }

        $randomIds = array_rand(array_flip($ids), $numberOfRows);
        return CarBrand::whereIn('id', $randomIds)
            ->whereSlugIsNotEqual($slug)
            ->get();
    }
}
