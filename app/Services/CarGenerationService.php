<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

interface CarGenerationService
{
    public function findAllByModel(string $slug): Collection;
}
