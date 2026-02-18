<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Pest\Arch\Support\Composer;
use Pest\Support\View;

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
       Paginator::useBootstrapFive();
       view()->composer('layouts.frontend.forntendApp', function ($view) {
            $view->with('categories',Category::select('id','category_name')->get());
       });
    }
}
