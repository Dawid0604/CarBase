<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;

interface EngineRepository
{
    public function findNewest(): Collection;

    public function findPopular(): Collection;
}
