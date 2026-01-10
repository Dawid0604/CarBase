<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use Illuminate\Support\Collection;
use App\Repositories\CarGenerationRepository;
use App\ValueObjects\Generation\CarGenerationDto;

final class CarGenerationServiceImpl implements CarGenerationService
{
    public function __construct(
        private readonly CarGenerationRepository $repository
    ) {
    }

    #[Override]
    public function findAllByModel(string $slug): Collection
    {
        return $this
            ->repository
            ->findAllByModel($slug)
            ->map(CarGenerationDto::fromModel(...));
    }
}
