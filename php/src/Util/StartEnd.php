<?php namespace Rtds\Util;

class StartEnd {
    private $start;
    private $end;

    public function getStart(): String {
        return $this->start;
    }

    public function setStart(String $start) {
        $this->start = $start;
    }

    public function getEnd(): String {
        return $this->end;
    }

    public function setEnd(String $end) {
        $this->end = $end;
    }
}
