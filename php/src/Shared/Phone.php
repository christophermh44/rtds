<?php namespace Rtds\Shared;

class Phone {
    private $type;
    private $number;

    public function getType(): String {
        return $this->type;
    }

    public function setType(String $type) {
        $this->type = $type;
    }

    public function getNumber(): String {
        return $this->number;
    }

    public function setNumber(String $number) {
        $this->number = $number;
    }
}
