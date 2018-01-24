<?php namespace Rtds\FirstLevel;

use Rtds\Exception;
use Rtds\JsonHandler;

class Status extends JsonHandler {
    protected $status;
    protected $message;
    protected $available_data;

    public function getStatus(): String {
        return $this->status;
    }

    public function setStatus(String $status) {
        $this->status = $status;
    }

    public function getMessage(): String {
        return $this->message;
    }

    public function setMessage(String $message) {
        $this->message = $message;
    }

    public function getAvailableData(): array { // String[]
        return $this->available_data;
    }

    public function setAvailableData(array $available_data) { // String[]
        foreach ($available_data as $data) {
            if (!(is_string($data))) {
                throw new Exception('Error while adding available_data in Status object.');
            }
        }
        $this->available_data = $available_data;
    }
}
