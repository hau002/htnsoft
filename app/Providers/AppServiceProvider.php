<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Settings;
use Auth;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){

            $settings = Settings::where('id',1)->first();

            $view->with('settings',$settings);

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
