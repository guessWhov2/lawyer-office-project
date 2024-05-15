<?php

namespace App\Providers;

use App\Models\LegalCase;
use App\Policies\LegalCasePolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(LegalCase::class, LegalCasePolicy::class);
        Paginator::useBootstrap();
    }
}
