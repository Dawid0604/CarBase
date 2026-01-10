<?php

declare(strict_types=1);

namespace App\Services;

use Override;
use Illuminate\Support\Collection;
use App\ValueObjects\Model\CarModelDto;
use App\Repositories\CarModelRepository;

final class CarModelServiceImpl implements CarModelService
{
    public function __construct(
        private readonly CarModelRepository $carModelRepository
    ) {
    }

    #[Override]
    public function findAllByBrand(string $slug): Collection
    {
        return $this
            ->carModelRepository
            ->findAllByBrand($slug)
            ->map(CarModelDto::fromModel(...));
    }
}
