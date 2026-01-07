<?php

declare(strict_types=1);

use Illuminate\Support\Facades\{
    Auth,
    Route
};
use App\Http\Controllers\{
    EngineController,
    FallbackController,
    HomeController
};

Auth::routes();

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Engines
Route::get('/silnik/{slug}', [EngineController::class, 'details'])
    ->name('engine.details');

Route::prefix('silniki')->group(function () {

    Route::get('/{slug}', [EngineController::class, 'list'])
        ->name('engine.list');

    Route::get('/', [EngineController::class, 'brandList'])
        ->name('engine.brand.list');
});

// Fallback
Route::fallback([FallbackController::class, 'handle'])
    ->name('fallback');
