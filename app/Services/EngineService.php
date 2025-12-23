<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;
use App\ValueObjects\EngineDetailsDto;

interface EngineService
{
    public function findNewest(): Collection;

    public function findPopular(): Collection;

    public function findDetails(string $slug): EngineDetailsDto;

    public function findAllByBrand(string $slug): Collection;

    public function incrementNumberOfViews(string $slug): void;
}
