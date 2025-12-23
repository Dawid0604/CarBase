<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use Illuminate\Support\Collection;
use App\Repositories\EngineRepository;
use App\ValueObjects\{EngineDetailsDto, EngineDto, EngineListDto};

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

    #[Override]
    public function findAllByBrand(string $slug): Collection
    {
        return $this
            ->repository
            ->findAllByBrand($slug)
            ->map(EngineListDto::fromModel(...));
    }

    #[Override]
    public function incrementNumberOfViews(string $slug): void
    {
        $this
            ->repository
            ->incrementNumberOfViews($slug);
    }
}
