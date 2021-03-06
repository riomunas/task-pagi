<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Providers\Services\AuthService;
// use App\Providers\Services\Implementations\AuthServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind('App\Providers\Services\AuthService', 
        	'App\Providers\Services\Implementations\AuthServiceImpl');

        $this->app->bind('App\Providers\Services\ProductService', 
        	'App\Providers\Services\Implementations\ProductServiceImpl');
    }
}
