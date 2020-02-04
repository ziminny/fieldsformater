<?php

namespace Ziminny\Fieldsformater\fields;

use Ziminny\Fieldsformater\fields\AllFields;
use Ziminny\Fieldsformater\main\FieldsInterface;

abstract class Random extends AllFields implements FieldsInterface {

    private $initialValue;
    private $finalValue;
    private $fullValue;
    
    public function __construct()
    {
           
        

       
        if($this instanceof RandomHash) {
            $value = config('dataFormaterAll.random.hash.length');
        }
        if($this instanceof RandomNumber) {
            $value = config('dataFormaterAll.random.number.length');
        }
        if($this instanceof RandomString) {
            $value = config('dataFormaterAll.random.string.length');
        }
            
           $this->fullValue = explode('-',$value);

            
       
        
    }

    public function getRandom() {

        return $this->fullValue[0];

    }



    function sorteableFields(bool $verif) 
    {

       

    }

}