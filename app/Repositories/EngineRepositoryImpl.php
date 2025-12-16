<?php

declare(strict_types=1);

namespace App\Repositories;

use Override;
use App\Models\Engine;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

final class EngineRepositoryImpl implements EngineRepository
{
    #[Override]
    public function findNewest(): Collection
    {
        $numberOfRows = Config::get('pagination.index_page.newest_engines.items_per_page', 0);

        return Engine::selectWithBrand()
            ->limit($numberOfRows)
            ->orderByDesc('id')
            ->orderBy('name')
            ->get();
    }

    #[Override]
    public function findPopular(): Collection
    {
        $numberOfRows = Config::get('pagination.index_page.popular_engines.items_per_page', 0);

        return Engine::selectWithBrand()
            ->limit($numberOfRows)
            ->orderByDesc('id')
            ->orderBy('name')
            ->get();
    }
}
