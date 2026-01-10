<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\{
    CarBrandService,
    CarModelService
};

final class CarModelController extends Controller
{
    public function __construct(
        private readonly CarModelService $carModelService,
        private readonly CarBrandService $carBrandService
    ) {
    }

    public function models(string $slug): View
    {
        return view('car.model-list', [
            'brand' => [
                'name' => $this->carBrandService->findNameBySlug($slug),
                'slug' => $slug
            ],
            'models' => $this->carModelService->findAllByBrand($slug)
        ]);
    }
}
