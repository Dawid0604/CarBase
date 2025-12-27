<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\{RedirectResponse, Request};

final class FallbackController extends Controller
{
    public function handle(Request $request): RedirectResponse
    {
        $this->logUnknownRoute($request);
        return redirect()->route('home');
    }

    private function logUnknownRoute(Request $request): void
    {
        Log::warning(
            "Unknown route: {$request->fullUrl()}",
            [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'method' => $request->method(),
                'referer' => $request->header('referer')
            ]
        );
    }
}
