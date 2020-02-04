<?php

namespace Ziminny\Fieldsformater\main;

use Illuminate\Support\Facades\App;
use Ziminny\Fieldsformater\fields\Cell;
use Ziminny\Fieldsformater\fields\Cpf;
use Ziminny\Fieldsformater\fields\Rg;


class Fields
{
    private static $data;

    public static function cpf()
    {
        return App::make('Cpf')->get();
    }
    public static function cnpj()
    {
        return App::make('Cnpj')->get();
    }

    public static function rg()
    {
        return App::make('Rg')->get();
    }


    public static function randomNumber()
    {
        return App::make('RandomNumber')->get();
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
        self::$data = [self::residentialNumber(),self::cellNumber()];

        shuffle(self::$data); // sortea os dois metodos residentialNumber e cellNumber
        return self::$data[0];
    }

    public static function cpfOrCnpj()
    {
        self::$data = [self::cpf(),self::cnpj()];

        shuffle(self::$data); // sortea os dois metodos cpf e cnpj
        return self::$data[0];
    }

    public static function cpfOrCnpjOrRg()
    {
        self::$data = [self::cpf(),self::cnpj(),self::rg()];

        shuffle(self::$data); // sortea os dois metodos cpf e cnpj , rg
        return self::$data[0];
    }

}
