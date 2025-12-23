<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

interface CarBrandService
{
    public function findAll(): Collection;

    public function findNameBySlug(string $slug): string;

    public function findRandomEngines(string $slug): Collection;
}
