<?php

namespace App\Http\Controllers;

use App\Services\{CarBrandService, EngineService};
use Illuminate\View\View;

final class HomeController extends Controller
{
    public function __construct(
        private readonly CarBrandService $brandService,
        private readonly EngineService $engineService
    ) {}

    public function index(): View
    {
        return view('home', [
            'brands' => $this->brandService->findAll(),
            'engines' => [
                'popular' => $this->engineService->findPopular(),
                'newest' => $this->engineService->findNewest()
            ]
        ]);
    }
}
