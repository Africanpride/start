<?php

namespace App\Providers;

use App\Models\Business;
use illuminate\support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::defaultView('pagination::bootstrap-4');

        $business = Business::all()->first();
        // view()->share('business', $business);
        View::share('business', $business);

    }
}
