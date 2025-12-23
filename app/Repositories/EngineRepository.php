<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Engine;
use Illuminate\Support\Collection;

interface EngineRepository
{
    public function findNewest(): Collection;

    public function findPopular(): Collection;

    public function findDetails(string $slug): Engine;

    public function findAllByBrand(string $slug): Collection;

    public function incrementNumberOfViews(string $slug): void;
}
