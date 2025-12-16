<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

interface EngineService
{
    public function findNewest(): Collection;

    public function findPopular(): Collection;
}
