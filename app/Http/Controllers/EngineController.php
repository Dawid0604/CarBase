<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

final class EngineController extends Controller
{

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function details(string $slug): View
    {
        return view('home');
    }
}
