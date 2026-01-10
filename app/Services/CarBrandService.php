<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

interface CarBrandService
{
    public function findAllWithEngines(): Collection;

    public function findAllWithCarModels(): Collection;

    public function findNameBySlug(string $slug): string;

    public function findRandomEngines(string $slug): Collection;
}
