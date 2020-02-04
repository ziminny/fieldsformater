<?php
namespace Ziminny\Fieldsformater\Fields;
use Ziminny\Fieldsformater\fields\AllFields;
use Ziminny\Fieldsformater\main\FieldsInterface;
class Cnpj extends AllFields implements FieldsInterface {

    /** @var int 9 primeiros numeros do CPF */
    private const LENGTHCPF = 13;

    /** @var array ultimos 2 dig */
    private $digitsVerif = [];

    public function __construct()
    {
        for ($i = 0; $i < self::LENGTHCPF; $i++) {
            /* preenche o array com 9 digitos aleatorios no formato [1,2,3,4,5,6,7,8,9] */
            $this->fieldd[$i] = rand(0,9);
            if($i<2) {
                /* preenche os dig verif no formato [0,1] */
                $this->digitsVerif[$i] = rand(0,9);
            }

        }

    }

    /**
     * @param return string
     *
     */
    public  function sorteableFields(bool $isValid)  {

       /* concatena os 9 digitos do array no formato [123456789] */
        $this->fieldd = implode('',(array)$this->fieldd);
       /* concatena os dois ultimos dig no formato [12]*/
        $this->digitsVerif = implode('',(array)$this->digitsVerif);
       /* define o formato [123?456?789] ou [123456789]*/
       // $this->fieldConcat = $this->teste(['0-3','3-3','6-3']);
       /* seta no metodo */
        $this->setData(
              $this->fieldd,
              [
                  [0,3],
                  [3,3],
                  [6,3],
                  [9,4]],
              [
                  'cnpj'=>  /* dentro do metodo fica a configuração dos separadores */
                         [
                             'first',
                             'second',
                             'third'
                         ]
              ]);

       /* caso CPF nao seja valido*/
        
        /* concatena dentro do construr o valor completo */


             return $this->getData();
       

                         }
}
