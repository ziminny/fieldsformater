<?php


namespace Ziminny\Fieldsformater\Fields;


class AllFields
{

    private $full;
    private $data;
    public $fieldd = [];
    public $fieldConcat;


    public function getFull() :string
    {
        return $this->full;

    }

    public function setFull(string $full) :void
    {
        $this->full = $full;
    }

    public function getData() :string
    {
        return $this->data;

    }

    public function setData(array $data) :void
    {
        $this->data = $this->dataFormated($data);
    }

    public function arqConfigFormat(string $field , string $position) {

        $result = (string) config('dataFormaterAll.'.$field.'.signal') ? config('dataFormaterAll.'.$field.'.'.$position) : '';

        return $result;

    }

    public function dataFormated(array $intervals)
    {
        // 0->3   3->3 6->3 ['0-1','3-3,6-3]
        $firstInvervelCount =  substr($intervals[0],0,1);
        $firstInvervelLength = substr($intervals[0],2,1);

        $secondInvervelCount =  substr($intervals[1],0,1);
        $secondInvervelLength =  substr($intervals[1],2,1);

        $thirdInvervelCount =  substr($intervals[2],0,1);
        $thirdInvervelLength = substr($intervals[2],2,1);

        return $this->fieldConcat = substr($this->fieldd,(int)$firstInvervelCount,(int)$firstInvervelLength).
            $this->arqConfigFormat('cpf','first').
            substr($this->fieldd,(int) $secondInvervelCount,(int)$secondInvervelLength).
            $this->arqConfigFormat('cpf','second').
            substr($this->fieldd,(int) $thirdInvervelCount,(int) $thirdInvervelLength);

    }

}
