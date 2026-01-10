<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\CarGenerationService;

final class CarGenerationController extends Controller
{
    public function __construct(
        private readonly CarGenerationService $carGenerationService
    ) {
    }

    public function generations(string $slug): View
    {
        $generations = $this
            ->carGenerationService
            ->findAllByModel($slug);

        $firstGeneration = $generations->first();

        return view('car.generation-list', [
            'model' => [
                'name' => $firstGeneration->model['name'],
                'slug' => $firstGeneration->model['slug']
            ],
            'brand' => [
                'name' => $firstGeneration->brand['name'],
                'slug' => $firstGeneration->brand['slug']
            ],
            'generations' => $generations
        ]);
    }
}
