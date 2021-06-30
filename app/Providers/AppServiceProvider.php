<?php

namespace App\Providers;

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
        if(env('APP_ASSETS') == 'local'){
            \DB::listen(function($query) {
                \Log::info(
                    $query->sql,
                    $query->bindings,
                    $query->time
                );
            });
        } else {
            \Schema::defaultStringLength(191);
        }
    }
}
