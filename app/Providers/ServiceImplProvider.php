<?php

declare(strict_types=1);

namespace App\Providers;

use Override;
use Illuminate\Support\ServiceProvider;

final class ServiceImplProvider extends ServiceProvider
{
    public $singletons = [
        \App\Services\CarBrandService::class => \App\Services\CarBrandServiceImpl::class,
        \App\Services\EngineService::class => \App\Services\EngineServiceImpl::class,
        \App\Services\UserService::class => \App\Services\UserServiceImpl::class,
        \App\Services\CarModelService::class => \App\Services\CarModelServiceImpl::class,
        \App\Services\CarGenerationService::class => \App\Services\CarGenerationServiceImpl::class
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
