<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;

final class FallbackController extends Controller
{
    public function handle(Request $request): View
    {
        $this->logUnknownRoute($request);
        return view('home');
    }

    private function logUnknownRoute(Request $request): void
    {
        Log::warning(
            "Unknown route: {$request->fullUrl()}",
            [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]
        );
    }
}
