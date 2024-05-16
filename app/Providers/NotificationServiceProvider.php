<?php

namespace App\Providers;

use App\Notifications\StokNotification;
use Illuminate\Support\ServiceProvider;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->make(ChannelManager::class)->extend('fonnte', function () {
            return new \App\Channels\FonnteChannel();
        });
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    
}
