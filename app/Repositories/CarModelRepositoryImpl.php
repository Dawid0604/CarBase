<?php

declare(strict_types=1);

namespace App\Repositories;

use Override;
use App\Models\CarModel;
use Illuminate\Support\Collection;

final class CarModelRepositoryImpl implements CarModelRepository
{
    #[Override]
    public function findAllByBrand(string $slug): Collection
    {
        return CarModel::query()
            ->withCount('generations')
            ->joinWithBrand()
            ->whereBrandSlug($slug)
            ->get();
    }
}
