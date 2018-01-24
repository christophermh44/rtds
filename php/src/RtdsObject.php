<?php namespace Rtds;

class RtdsObject {
    private $structure = [];

    public function __construct() {}

    public function __set($name, $value) {
        $this->structure[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->structure)) {
            return $this->structure[$name];
        }
        return null;
    }

    public function __isset($name) {
        return isset($this->structure[$name]);
    }

    public function __unset($name) {
        unset($this->structure[$name]);
    }

    public function toJsonObject($status, $message) {
        $object = $this->structure;
        $object['status'] = [
            'status' => $status,
            'message' => $message,
            'available_data' => array_keys($this->structure)
        ];
        return json_encode($object);
    }
}
