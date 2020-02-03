<?php

namespace Ziminny\Fieldsformater\main;

use Illuminate\Support\Facades\App;
use Ziminny\Fieldsformater\fields\Cell;
use Ziminny\Fieldsformater\fields\Cpf;
use Ziminny\Fieldsformater\fields\Rg;
use Ziminny\Fieldsformater\main\DataFormater;

class Fields
{

    public static function cpf()
    {
        return App::make('Cpf')->get();
    }

    public static function rg()
    {
        return App::make('Rg')->get();
    }

    private static function cellNumber()
    {
        return App::make('Cell')->get();

    }

    private static function residentialNumber()
    {
        return App::make('Residential')->get();
    }

    public static function phones()
    {
        $numbersOfPhones = [self::residentialNumber(),self::cellNumber()];

        shuffle($numbersOfPhones); // sortea os dois metodos residentialNumber e cellNumber
        return $numbersOfPhones[0];
    }

}
