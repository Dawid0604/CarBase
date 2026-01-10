<?php

declare(strict_types=1);

use Illuminate\Support\Facades\{
    Auth,
    Route
};
use App\Http\Controllers\{
    CarBrandController,
    CarGenerationController,
    CarModelController,
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

    Route::get('/', [CarBrandController::class, 'engines'])
        ->name('engine.brand.list');
});

Route::prefix('samochody')->group(function () {
    Route::get('/', [CarBrandController::class, 'models'])
        ->name(name: 'car.brand.list');

    Route::get('/{slug}', [CarModelController::class, 'models'])
        ->name('car.model.list');

    Route::get('/{slug}/generacje', [CarGenerationController::class, 'generations'])
        ->name('car.generation.list');
});

// Fallback
Route::fallback([FallbackController::class, 'handle'])
    ->name('fallback');
