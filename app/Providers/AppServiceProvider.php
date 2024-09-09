<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Section;
use App\Observers\OrderObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
define('PAGINATE' , 15);
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
        Paginator::useBootstrap();
        View::share('sections', Section::whereNull('section_id')->get());
        // Order::observe(OrderObserver::class);
    }
}

