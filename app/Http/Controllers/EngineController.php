<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Services\{
    CarBrandService,
    EngineService
};

final class EngineController extends Controller
{
    public function __construct(
        private readonly EngineService $engineService,
        private readonly CarBrandService $carBrandService
    ) {
    }

    public function details(string $slug): View
    {
        $engine = $this->engineService->findDetails($slug);

        if (Auth::check()) {
            $this->engineService->incrementNumberOfViews($slug);
        }

        return view('engine.details', [
            'data' => $engine
        ]);
    }

    public function list(string $slug): View
    {
        return view('engine.list', [
            'engines' => $this->engineService->findAllByBrand($slug),
            'brand' => [
                'name' => $this->carBrandService->findNameBySlug($slug)
            ],
            'otherBrands' => $this->carBrandService->findRandomEngines($slug)
        ]);
    }
}
