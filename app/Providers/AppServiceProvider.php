<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use View;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale(getCurrentLocale());
        View::share('website', url('/') . '/website/');
        View::share('panel', url('/') . '/panel/');
        View::share('panel_assets', url('/') . '/panel/app-assets/');
        View::share('pLayout', 'admin.layouts.');
        View::share('sLayout', 'layouts.');

        view()->composer('*',function($view) {
           $user = Auth::user();
           $view->with('userAuth', $user);
       });
        view()->composer('*',function($view) {
           $langs = getAllLangFromDB();
           $view->with('dbLangs', $langs);
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
