<?php

namespace App\Providers;

use App\Traits\Constants;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Constants;
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
        view()->composer('*', function ($view) {
            $view->with([
                'logo_img' => route('index') . env('RESOURCE_PATH') . '/logo.png',
                'favicon_img' => route('index') . env('RESOURCE_PATH') . '/logo.png',
                'public_source' => route('index') . env('RESOURCE_PATH'),
                'web_source' => route('index') . env('RESOURCE_PATH') . '/web',
                'admin_source' => route('index') . env('RESOURCE_PATH') . '/dashboard',
                'activeStatus' => $this->activeStatus,
                'pendingStatus' => $this->pendingStatus,
                'inactiveStatus' => $this->inactiveStatus,
            ]);
        });
    }
}
