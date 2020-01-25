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


}
