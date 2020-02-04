<?php

namespace Ziminny\Fieldsformater\fields;
use phpDocumentor\Reflection\Types\Parent_;

use Ziminny\Fieldsformater\main\FieldsInterface;

class Cell extends Phones
{
    public function __construct()
    {
       Parent::__construct('cell');
    }

    function sorteableFields(bool $verif)
    {
        return $this->completeNumber();
    }
}
