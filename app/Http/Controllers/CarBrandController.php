<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CarBrandService;
use Illuminate\Contracts\View\View;

final class CarBrandController extends Controller
{
    public function __construct(
        private readonly CarBrandService $carBrandService
    ) {}

    public function list(): View
    {
        return view('brand.list', [
            'brands' => $this->carBrandService->findAll()
        ]);
    }
}
