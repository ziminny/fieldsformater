<?php


namespace Ziminny\Fieldsformater\main;


use Ziminny\Fieldsformater\fields\Cpf;
use Ziminny\Fieldsformater\main\DataFormater;

class Fields
{

    public static function Cpf()
    {
        return new DataFormater(new Cpf());
    }

}
