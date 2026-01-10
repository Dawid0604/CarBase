<?php

declare(strict_types=1);

namespace App\Repositories;

use Override;
use App\Models\CarGeneration;
use Illuminate\Support\Collection;

final class CarGenerationRepositoryImpl implements CarGenerationRepository
{
    #[Override]
    public function findAllByModel(string $slug): Collection
    {
        return CarGeneration::query()
            ->whereHas('model', function ($query) use ($slug) {
                $query
                    ->where('slug', $slug)
                    ->select('id', 'name', 'slug', 'brand_id');
            })
            ->with('model.brand:id,name,slug')
            ->get([
                'slug',
                'name',
                'production_from',
                'production_to',
                'image',
                'model_id'
            ]);
    }
}
