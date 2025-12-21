<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Services\EngineService;

final class EngineController extends Controller
{
    public function __construct(private readonly EngineService $service) {}

    public function details(string $slug): View
    {
        return view('engine.engine_details', [
            'data' => $this->service->findDetails($slug)
        ]);
    }
}
