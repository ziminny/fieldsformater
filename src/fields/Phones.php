<?php

namespace Ziminny\Fieldsformater\fields;

use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Ziminny\Fieldsformater\main\FieldsInterface;

abstract class Phones extends AllFields implements FieldsInterface
{

    /** @var string codigo de area Brasil*/
private $prefixCountry= '55';
   /** @var int primeiro numero do codigo estadual de 1 a 9*/
private $firstNumberArea;
   /** @var int segundo numero do cogigo postal de 0 a 9 */
private $secondNumberArea;
  /** @var string contatenação das variaveis ->  $firstNumberArea e $secondNumberArea*/
private $numberArea;
  /** @var string tipo de telefone recebe cell ou residential*/
private $typePhone;
  /** @var int recebe 4 ou 5 usado dentro do set data , se o objeto instanciado for cell recebe 5
               caso contrario recebe 4 */
private $limit;
 /**
  * @return string
  *  retorna o codigo de area com 2 digitos ou vazio
  */
private function getNumberArea()
{
    $this->firstNumberArea = rand(1,9);
    $this->secondNumberArea = rand(0,9);
    /* se o valor de retire no codeState estiver definido como yes retira os 2 numeros */
    if(config('dataFormaterAll.phones.'.$this->typePhone.'.codeState.retireNumber') == 'yes') {
        $this->numberArea = '';
        return $this->numberArea;
    }
    $this->numberArea = (string) $this->firstNumberArea.''.$this->secondNumberArea;
    return $this->numberArea;
}
 /**
  * @return string
  *  retorna o codigo do pais com 2 digitos mais os carac. ou vazio setados
  */
private function prefixCountry()
{
    if(config('dataFormaterAll.phones.'.$this->typePhone.'.codeCountry.retireNumber') == 'yes') {
        $this->prefixCountry = '';
    }
    $this->setData(
           $this->prefixCountry,
             [
               [0,0],
               [0,2],
               [2,1]
              ],
              [
           'phones.'.$this->typePhone.'.codeCountry' => [

             'first',
             'second'
         ]
        ]
    );
    return $this->getData();
}
 /**
  * @return string
  *  retorna o codigo do estado com 2 digitos mais os carac. ou vazio setados
  */
private function prefixArea()
{
    $this->setData(
          $this->getNumberArea(),
        [
            [0,0],
            [0,2],
            [2,0],
            [2,1]
        ],
        [
            'phones.'.$this->typePhone.'.codeState' => [
                'first',
                'second',
                'third'
            ]
        ]
    );
    return $this->getData();
}
 /**
  * @return string
  *  retorna o numero de 9 ou 8 digitos cell ou residential
  */
private function number()
    {
        /* concatena os 9 ou 8  digitos do array no formato [123456789] */
        $this->fieldd = implode('',(array)$this->fieldd);
        $this->setData(
            $this->fieldd,
            [
                [0,$this->limit], /** IMPORTANT */
                [$this->limit,4]
            ],
            [
                'phones.'.$this->typePhone.'.number' => [
                    'first',
                                                        ]
            ]
        );
        return $this->getData();
    }
   /**
    * @return string
    *  retorna o numero completo exemplo cell : +55 (00) 00000-0000 , residential : +55 (00) 00000-000
    */
public function completeNumber()
{
    return $this->prefixCountry().''.$this->prefixArea().''.$this->number();
}

    public function sorteableFields(bool $verif)
    {
        // TODO: Implement sorteableFields() method.
    }
    /**
     *  CONSTRUCTOR
     *     recebe um tipo string como  parâmetro , cell ou residential
     */
    public function __construct(string $typePhone)
    {
        $this->typePhone = $typePhone;
        // se for uma instancia de Cell
        if($this instanceof Cell) {

            $this->limit = 5;
            for($i = 0; $i <9; $i++) {
                    $this->fieldd[0]  = 9;
                    $this->fieldd[1]  = rand(1,9);
                    $this->fieldd[$i] = rand(0,9);
            }
               return;
                                  }
            for ($i = 0; $i < 8; $i++) {
                $this->limit = 4;
                $this->fieldd[0]  = rand(3, 4);
                $this->fieldd[1]  = rand(3, 6);
                $this->fieldd[$i] = rand(0, 9);
                                       }
    }
}
