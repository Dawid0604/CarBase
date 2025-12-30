<?php

declare(strict_types=1);

namespace App\Providers;

use Override;
use Illuminate\Support\ServiceProvider;

final class RepositoryImplProvider extends ServiceProvider
{
    public $singletons = [
        \App\Repositories\CarBrandRepository::class => \App\Repositories\CarBrandRepositoryImpl::class,
        \App\Repositories\EngineRepository::class => \App\Repositories\EngineRepositoryImpl::class,
        \App\Repositories\UserRepository::class => \App\Repositories\UserRepositoryImpl::class
    ];

    /**
     * Register services.
     */
    #[Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
