<?php

namespace Ziminny\Fieldsformater\Fields;

use Ziminny\Fieldsformater\main\FieldsInterface;
use Ziminny\Fieldsformater\fields\AllFields;

class Rg extends AllFields implements FieldsInterface
{
    private const LENGTHRG = 8;

    /** @var array ultimos 2 dig */
    private $digitsVerif = [];

    public function __construct()
    {
        for ($i = 0; $i <= self::LENGTHRG; $i++) {
            /* preenche o array com 9 digitos aleatorios no formato [1,2,3,4,5,6,7,8,9] */
            $this->fieldd[$i] = rand(0,9);
        }
    }

    function sorteableFields(bool $verif) {

        $this->fieldd = implode('' , (array) $this->fieldd);
        $this->setData(
            $this->fieldd,
            [
                [0,1],
                [1,3],
                [4,3],
                [2,1]
            ],
            [
                'rg'=>
                    [
                        'first',
                        'second',
                        'third'
                    ]
            ]
        );
        return $this->getData();
    }
}
