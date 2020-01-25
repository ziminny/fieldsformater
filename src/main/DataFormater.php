<?php

namespace Ziminny\Fieldsformater\main;



use Ziminny\Fieldsformater\fields\Cpf;

use Ziminny\Fieldsformater\fields\Rg;
use Ziminny\Fieldsformater\main\FieldsInterface;


class DataFormater {

    private $returnData;
    private $isValid;
    protected $data;
    private $f;

    public function __construct(FieldsInterface $data)
    {
    $this->data = $data;

    }

    public function get()  {

                $this->returnData = $this->data->sorteableFields(false);
                return $this;

        }




    public function valid() {

        if($this->data instanceof Cpf) {
            $this->returnData = $this->data->sorteableFields(true);
            return $this;
        }
        echo 'OBS : método cpf não encontrado ';

    }


    public function __toString()
    {
        return $this->returnData;
    }

}
