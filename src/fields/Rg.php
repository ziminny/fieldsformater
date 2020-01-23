<?php


namespace Ziminny\Fieldsformater\Fields;


class Rg extends AllFields
{
    private const LENGTHCPF = 8;

    public function __construct()
    {
        for ($i=0; $i<self::LENGTHCPF; $i++) {
            $this->fieldd[$i] = rand(0,9);
        }
    }

    public function getRg() {

        $this->fieldd = implode('', (array) $this->fieldd);
        $this->fieldConcat = substr($this->fieldd,0,1).'.'.
            substr($this->fieldd,0,1).'.'.
            substr($this->fieldd,4,3).'-'.
            substr($this->fieldd,7,1);

    }




}
