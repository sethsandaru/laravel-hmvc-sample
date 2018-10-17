<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 7:59 PM
 */

namespace App\Modules;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class HMVCServiceProvider extends ServiceProvider
{
    /**
     * Register config file here
     * alias => path
     */
    private $configFile = [
        'homeconfig' => 'Home/Configs/homeconfig.php',
    ];

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        // register your config file here
        foreach ($this->configFile as $alias => $path) {
            $this->mergeConfigFrom(__DIR__ . "/" . $path, $alias);
        }
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $directories = array_map('basename', File::directories(__DIR__));

        foreach ($directories as $moduleName) {
            $this->_registerModule($moduleName);
        }
    }

    private function _registerModule($moduleName) {
        $modulePath = __DIR__ . "/$moduleName/";

        // boot route
        if (File::exists($modulePath . "routes.php")) {
            $this->loadRoutesFrom($modulePath . "routes.php");
        }

        // boot migration
        if (File::exists($modulePath . "Migrations")) {
            $this->loadMigrationsFrom($modulePath . "Migrations");
        }

        // boot languages
        if (File::exists($modulePath . "Languages")) {
            $this->loadTranslationsFrom($modulePath . "Languages", $moduleName);
        }

        // boot views
        if (File::exists($modulePath . "Views")) {
            $this->loadViewsFrom($modulePath . "Views", $moduleName);
        }
    }
}