<?php

namespace Otifsolutions\ActivityLogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Otifsolutions\ActivityLogger\Services\ActivityLogger;

class ActivityLoggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->mergeConfigFrom(__DIR__.'/../config/activitylogger.php', 'activitylogger');
        $this->publishes([
            __DIR__.'/../config/activitylogger.php' => config_path('activitylogger.php'),
        ], 'config');

        foreach (config('activitylogger.models', []) as $model => $observer) {
            $model::observe(new $observer);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'activity-logger');

        // Auth Event Logging
        Event::listen(Login::class, function ($event) {
            ActivityLogger::log('login', get_class($event->user), $event->user->id, 'User logged in');
        });

        Event::listen(Logout::class, function ($event) {
            ActivityLogger::log('logout', get_class($event->user), $event->user->id, 'User logged out');
        });
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'activity-logger');

    }

    public function register()
    {
        //
    }
}
