<?php

namespace TienVanBui\Province;

use Illuminate\Support\ServiceProvider;
use TienVanBui\Province\Database\Seeders\ProvinceSeeder;
use TienVanBui\Province\Http\Controllers\GetAllProvinceJapanController;

class ProvinceJapanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make(GetAllProvinceJapanController::class);
        $this->app->bind('ProvinceSeeder', function(){
			return new ProvinceSeeder;
		});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/province.php', 'province');
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
            $this->publishes([__DIR__ . '/config/province.php' => config_path('province.php')], 'config');
        }
    }
}
