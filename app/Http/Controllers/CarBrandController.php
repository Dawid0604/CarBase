<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CarBrandService;
use Illuminate\Contracts\View\View;

final class CarBrandController extends Controller
{
    public function __construct(
        private readonly CarBrandService $carBrandService
    ) {
    }

    public function models(): View
    {
        return view("car.brand-list", [
            'brands' => $this->carBrandService->findAllWithCarModels(),
        ]);
    }

    public function engines(): View
    {
        return view("engine.brand-list", [
            'brands' => $this->carBrandService->findAllWithEngines(),
        ]);
    }
}
