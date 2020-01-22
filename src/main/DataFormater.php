<?php

namespace Ziminny\Fieldsformater\main;


use Ziminny\Fieldsformater\fields\Cpf;




class DataFormater  {

    private $returnData;
    private $isValid;
    private $cpf;
    private $f;

    public function __construct()
    {
    $this->cpf = new Cpf();

    }

    public function getCpf()  {

                $this->returnData = $this->cpf->sorteableCpf(false);
                return $this;

        }


    public function valid() {
        $this->returnData = $this->cpf->sorteableCpf(true);
        return $this;
    }

    public function unique() {


    }

    public function __toString()
    {
        return $this->returnData;
    }

}
