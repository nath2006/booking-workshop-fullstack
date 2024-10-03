<?php

namespace App\Providers;

use App\Filament\Resources\WorkshopResource;
use App\Repositories\BookingRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\WorkshopRepository;
use App\Repositories\Contracts\BookingRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\WorkshopRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(BookingRepositoryInterface::class, BookingRepository::class);
        $this->app->singleton(WorkshopRepositoryInterface::class, WorkshopRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
