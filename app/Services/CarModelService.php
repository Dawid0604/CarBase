<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

interface CarModelService
{
    public function findAllByBrand(string $slug): Collection;
}
