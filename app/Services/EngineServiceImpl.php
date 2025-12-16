<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use App\ValueObjects\EngineDto;
use Illuminate\Support\Collection;
use App\Repositories\EngineRepository;

final class EngineServiceImpl implements EngineService
{
    public function __construct(private readonly EngineRepository $repository) {}

    #[Override]
    public function findPopular(): Collection
    {
        return $this
            ->repository
            ->findPopular()
            ->map(EngineDto::fromModel(...));
    }

    #[Override]
    public function findNewest(): Collection
    {
        return $this
            ->repository
            ->findNewest()
            ->map(EngineDto::fromModel(...));
    }
}
