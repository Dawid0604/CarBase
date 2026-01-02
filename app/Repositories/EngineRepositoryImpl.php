<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Engine;
use Exception, Override;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Config, Log};

final class EngineRepositoryImpl implements EngineRepository
{
    #[Override]
    public function findNewest(): Collection
    {
        $numberOfRows = Config::get('pagination.index_page.newest_engines.items_per_page', 0);

        return Engine::selectWithBrand()
            ->limit($numberOfRows)
            ->orderByDesc('engines.id')
            ->orderBy('engines.name')
            ->get();
    }

    #[Override]
    public function findPopular(): Collection
    {
        $numberOfRows = Config::get('pagination.index_page.popular_engines.items_per_page', 0);

        return Engine::selectWithBrandAndStats()
            ->limit($numberOfRows)
            ->orderByDesc('engines.number_of_views')
            ->orderBy('engines.name')
            ->get();
    }

    #[Override]
    public function findDetails(string $slug): Engine
    {
        return Engine::selectDetails()
            ->whereSlug($slug)
            ->firstOrFail();
    }

    #[Override]
    public function findAllByBrand(string $slug): Collection
    {
        return Engine::selectByBrand($slug)
            ->orderBy('engines.name')
            ->get();
    }

    #[Override]
    public function incrementNumberOfViews(string $slug): void
    {
        try {
            Engine::whereSlug($slug)->increment('number_of_views');
        } catch (Exception $exception) {
            Log::warning('Failed to increment engine number of views', [
                'slug' => $slug,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
