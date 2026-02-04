<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(\App\Contracts\PaymentGatewayInterface::class, function ($app) {
            return new \App\Services\MidtransPaymentService();
        });
        $this->app->singleton(\App\Contracts\NotificationChannelInterface::class, function ($app) {
            return new \App\Services\WaGatewayNotificationService();
        });
    }

    public function boot(): void
    {
        //
    }
}
