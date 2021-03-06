<?php


namespace Ziminny\Fieldsformater\Fields;


use phpDocumentor\Reflection\Types\Mixed_;

abstract class AllFields
{

    private $data;
    public $fieldd = [];
    public $fieldConcat;

    public function getData() :string
    {
        return $this->data;
    }

    public function setData(string $field , array $intervals , array $arqConfigNames) :void
    {
        $this->data = $this->dataFormated( $field ,$intervals , $arqConfigNames);
    }

    private function arqConfigFormat(string $field , string $position) /** @var  $result null no primeiro laco e $result strign no segundo */
    {
        $result = (string) config('dataFormaterAll.'.$field.'.signal') ? config('dataFormaterAll.'.$field.'.'.$position) : '';
        return $result;
    }

    private function dataFormated(  string $field , array $intervals , array $fieldsNames) :string
    {
     /* pega a chave do array Ex .: CPF */
     $key = key($fieldsNames);
     /* adiciona um valor vazio no inicio do arary p/ nao iniciar com sinal*/

            array_unshift($fieldsNames[$key], '');

     /* variavel que une os arrays dos intervalos exemplo [0,3[0,2]... 0302 */
     $uneArray = null;
     /* concatena todos os valores do array */
     $total = '';
     /* unindo todos os arrays */
        for ($i = 0; $i<count($intervals); $i++) {
            $uneArray .= implode('',(array) $intervals[$i]);
        }
     /* contador , precorre todos os arrays com as posicoes Ex .: 'first' , 'second' ... */
        $count = 0;
     /* valor final  */
        for ($j = 0; $j<strlen($uneArray); $j+=2) {
            $total .= (string)$this->arqConfigFormat($key,$fieldsNames[$key][$count++]).substr($field,(int)substr($uneArray,$j,1),(int)substr($uneArray,$j+1,1));
        }

           return $total;
    }
}
