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
        view()->composer('*',function($view){

            $view->with([
                'logo_img' => route('index').env('ASSET_URL').'/logo.png',
                'favicon_img' => route('index').env('ASSET_URL').'/logo.png',
                'public_source' => route('index').env('ASSET_URL'),
                'web_source' => route('index').env('ASSET_URL').'/web',
                'admin_source' => route('index').env('ASSET_URL').'/admin',
            ]);
        });

    }
}
