<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CarModel;
use Illuminate\Support\Collection;

interface CarModelRepository
{
    public function findAllByBrand(string $slug): Collection;
}
