<?php

namespace Ziminny\Fieldsformater\main;

use Illuminate\Support\ServiceProvider;

class FieldsFormaterServiceProvider extends ServiceProvider
{

    protected $defer = false;

    /**
     * Register services.
     *
     * @return void
     */


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . "/../config/dataFormaterAll.php" => config_path('dataFormaterAll.php')], 'configure');
    }

    public function register()
    {

        $direc = __DIR__ . "/../config/dataFormaterAll.php";
        $this->mergeConfigFrom($direc,'dataFormaterAll');
    }
}
