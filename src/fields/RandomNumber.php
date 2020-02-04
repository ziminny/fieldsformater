<?php

namespace Ziminny\Fieldsformater\fields;

use phpDocumentor\Reflection\Types\Parent_;

class RandomNumber extends Random {

    public function __construct()
    {
        Parent::__construct();
        
    }

    function sorteableFields(bool $verif) {

       

        return $this->getRandom();

    }

}