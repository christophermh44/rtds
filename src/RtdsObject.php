<?php namespace Rtds;

use Rtds\FirstLevel\Status;

class RtdsObject extends JsonHandler {
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

    public function fromJson($serial) {
        $array = json_decode($serial, true);
        return $this->bind($array);
    }

    public function toJson($status, $message) {
        $object = $this->structure;
        $status = new Status();
        $status->setStatus($status);
        $status->setMessage($message);
        $status->setAvailableData(array_keys($this->structure));
        $object->status = $status;
        return json_encode($object);
    }

    public function bind(array $array): JsonHandler { // RtdsObject
        foreach ($array as $key => $value) {
            $this->{$key} = (new (([
                'status' => '\\Rtds\\FirstLevel\\Status',
                'radio' => '\\Rtds\\FirstLevel\\Radio',
                'show' => '\\Rtds\\FirstLevel\\Show',
                'stream' => '\\Rtds\\FirstLevel\\Stream',
                'tags' => '\\Rtds\\FirstLevel\\Tags'
            ])($value)))->bind($value);
        }
    }
}
