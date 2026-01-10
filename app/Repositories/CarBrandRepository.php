<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;

interface CarBrandRepository
{
    public function findAllWithEngines(): Collection;

    public function findAllWithCarModels(): Collection;

    public function findNameBySlug(string $slug): string;

    public function findRandomEngines(string $slug, int $numberOfRows): Collection;
}
