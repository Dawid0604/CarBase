<?php

declare(strict_types=1);

namespace App\Providers;

use Override;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Services\{
    CarBrandService,
    CarBrandServiceImpl,
    EngineService,
    EngineServiceImpl
};
use App\Repositories\{
    CarBrandRepository,
    CarBrandRepositoryImpl,
    EngineRepository,
    EngineRepositoryImpl
};

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        // Services
        $this
            ->app
            ->singleton(CarBrandService::class, CarBrandServiceImpl::class);

        $this
            ->app
            ->singleton(EngineService::class, EngineServiceImpl::class);

        // Repositories
        $this
            ->app
            ->singleton(CarBrandRepository::class, CarBrandRepositoryImpl::class);

        $this
            ->app
            ->singleton(EngineRepository::class, EngineRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
