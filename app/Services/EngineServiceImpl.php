<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use Illuminate\Support\Collection;
use App\Repositories\EngineRepository;
use App\ValueObjects\{EngineDetailsDto, EngineDto};

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

    #[Override]
    public function findDetails(string $slug): EngineDetailsDto
    {
        return EngineDetailsDto::fromModel(
            $this->repository->findDetails($slug)
        );
    }
}
