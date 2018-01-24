<?php namespace Rtds\Shared;

use Rtds\Exception;
use Rtds\Util\StartEnd;

class Recurrence {
    private $days;
    private $dates;
    private $hours;

    public function getDays(): array { // String[]
        return $this->days;
    }

    public function setDays(array $days) { // String[]
        foreach ($days as $day) {
            if (!(is_string($day))) {
                throw new Exception('Error while adding days in Recurrence object.');
            }
        }
        $this->days = $days;
    }

    public function getDates(): StartEnd {
        return $this->dates;
    }

    public function setDates(StartEnd $dates) {
        $this->dates = $dates;
    }

    public function getHours(): StartEnd {
        return $this->hours;
    }

    public function setHours(StartEnd $hours) {
        $this->hours = $hours;
    }
}
