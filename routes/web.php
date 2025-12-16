<?php

declare(strict_types=1);

use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\{FallbackController, HomeController};

Auth::routes();

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::fallback([FallbackController::class, 'handle'])
    ->name('fallback');
