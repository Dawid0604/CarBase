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
}
