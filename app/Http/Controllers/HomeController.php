<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\{CarBrandService, EngineService};

final class HomeController extends Controller
{
    public function __construct(
        private readonly CarBrandService $brandService,
        private readonly EngineService $engineService
    ) {
    }

    public function index(): View
    {
        return view('home', [
            'brands' => $this->brandService->findAllWithEngines(),
            'engines' => [
                'popular' => $this->engineService->findPopular(),
                'newest' => $this->engineService->findNewest()
            ]
        ]);
    }
}
