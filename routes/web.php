<?php

declare(strict_types=1);

use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\{EngineController, FallbackController, HomeController};

Auth::routes();

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::prefix('engine')->group(function () {

    Route::get('/{slug}', [EngineController::class, 'details'])
        ->name('engine.details');
});

Route::fallback([FallbackController::class, 'handle'])
    ->name('fallback');
