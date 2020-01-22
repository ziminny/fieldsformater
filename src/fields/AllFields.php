<?php


namespace Ziminny\Fieldsformater\Fields;


class AllFields
{

    private $full;
    private $data;


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
        return $this->full;

    }

    public function setData(string $full) :void
    {
        $this->full = $full;
    }

}
