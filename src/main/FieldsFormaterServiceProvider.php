<?php

namespace Ziminny\Fieldsformater\main;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Ziminny\Fieldsformater\fields\Cell;
use Ziminny\Fieldsformater\fields\Cpf;
use Ziminny\Fieldsformater\fields\Residential;
use Ziminny\Fieldsformater\fields\Rg;

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

        $allClassArray = config('dataFormaterAll.class');

     foreach ($allClassArray as $key => $value) {
    $this->app->singleton($key, function () use ($value) {
        return new DataFormater(new $value);
    });
}
    }
}
