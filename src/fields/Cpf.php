<?php

namespace Ziminny\Fieldsformater\Fields;

use Ziminny\Fieldsformater\fields\AllFields;

class Cpf extends AllFields{

    /** @var int 9 primeiros numeros do CPF */
    private const LENGTHCPF = 9;
    /** @var string  concatenação no formato 000?000?000*/
    private $fieldConcat;
    /** @var array ultimos 2 dig */
    private $digitsVerif = [];
    /** @var array  gerador randomico dos 9 digitos*/
    private $fieldd = [];
    /** @var string sinal do primeiro intervalo */
   // private $firstSignal = (string) config('dataFormaterAll.cpf.first');

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
    public  function sorteableCpf(bool $isValid) :string {
       /* definições do arquivo config na pasta /conf/dataFormaterAll*/
        $firstSignal = (string) config('dataFormaterAll.cpf.signal') ? config('dataFormaterAll.cpf.first') : '';
        $secondSignal = (string) config('dataFormaterAll.cpf.signal') ? config('dataFormaterAll.cpf.second') : '';
        $thirdSignal = (string) config('dataFormaterAll.cpf.signal') ? config('dataFormaterAll.cpf.third') : '';
       /* concatena os 9 digitos do array no formato [123456789] */
        $this->fieldd = implode('',(array)$this->fieldd);
       /* concatena os dois ultimos dig no formato [12]*/
        $this->digitsVerif = implode('',(array)$this->digitsVerif);
       /* define o formato [123?456?789] ou [123456789]*/
        $this->fieldConcat = substr($this->fieldd,0,3).$firstSignal.substr($this->fieldd,3,3).$secondSignal.substr($this->fieldd,6,3);
       /* seta no metodo */
        $this->setData($this->fieldConcat);

       /* caso CPF nao seja valido*/
        if(!$isValid) {
        /* concatena dentro do construr o valor completo */
         $this->setFull($this->getData().$thirdSignal.$this->digitsVerif);

             return $this->getFull();
        }

        /* ----------------------- CPF VALIDO -------------------------- */

        /* CONTADORES */
        $count = 0;
        $countSecound = 0;
                               /* Primeiro digito verificador */
        for ($i=10; $i>=2; $i--) {
                 /* gerado o primeiro digito verificador */
                $firstDigit[] = (substr($this->fieldd , $count, 1)) * $i;
                $count++;
        }
         /* soma todos os digitos e pega o resto da divisão por 11 */
        $rest1 = array_sum($firstDigit) % 11;
        /* se o resto da divisão for menos que 2 rest1 recebe 0 caso contrario pega o resto da divisão */
        $rest1 = $rest1 <2 ? 0 : (11 - $rest1);

        /* concatena os 9 primeiros digitos com o primeiro digito verificador*/
        $newValueFirstDigit = $this->fieldd.''.$rest1;

                               /* Segundo digito verificador */
        for ($f=11; $f>=2; $f--) {
                 /* gerado o segundo digito verificador */
                 $secondDigit[] = (substr($newValueFirstDigit, $countSecound, 1)) * $f;
                 $countSecound++;

        }
        /* mesma lógica do 1 digito*/
        $rest2 = array_sum($secondDigit) % 11;
        $rest2 = $rest2 <2 ? 0 : (11 - $rest2);
        /* seta no construtor*/
        $this->setFull($this->getData().$thirdSignal.$rest1.''.$rest2);

        return $this->getFull();

    }


}
