<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use App\ValueObjects\CarBrandDto;
use Illuminate\Support\Collection;
use App\Repositories\CarBrandRepository;

final class CarBrandServiceImpl implements CarBrandService
{
    public function __construct(private readonly CarBrandRepository $repository) {}

    #[Override]
    public function findAll(): Collection
    {
        return $this
            ->repository
            ->findAll()
            ->map(CarBrandDto::fromModel(...));
    }
}
