<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\OrderRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

    }

    public function boot()
    {
        Schema::defaultStringLength(191);
        if (!\App::environment('local')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
