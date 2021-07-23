<?php

namespace App\Modules\Home\Providers;


use App\Modules\Home\Console\Commands\MyCommand;
use App\Modules\Home\Models\HomeConfig;
use App\Modules\Home\Policies\HomePolicy;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    public const MODULE_NAME = 'home';

    /**
     * Register bindings in the container.
     *
     * Register configuration of Module
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Configs/homeconfig.php', self::MODULE_NAME);
    }

    /**
     * Perform post-registration booting of services.
     *
     * Register the basic stuff
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/../Routes/routes.php");
        $this->loadMigrationsFrom(__DIR__ . "/../Migrations");
        $this->loadTranslationsFrom(__DIR__ . "/../Languages", self::MODULE_NAME);
        $this->loadViewsFrom(__DIR__ . "/../Views", self::MODULE_NAME);

        $this->commands([
            MyCommand::class,
        ]);

        Gate::policy(HomeConfig::class, HomePolicy::class);
    }
}
