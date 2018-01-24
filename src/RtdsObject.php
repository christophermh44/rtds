<?php namespace Rtds;

use Rtds\FirstLevel\Status;

class RtdsObject extends JsonHandler {
    protected $structure = [];

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

    public function send($code, $message) {
        $status = new Status();
        $status->setStatus($code);
        $status->setMessage($message);
        $status->setAvailableData(array_keys($this->structure));
        $this->status = $status;
	return $this->toJson();
    }

    public function toJson() {
        return json_encode($this);
    }

    public function bind(array $array): JsonHandler { // RtdsObject
        $classes = [
            'status' => '\\Rtds\\FirstLevel\\Status',
            'radio' => '\\Rtds\\FirstLevel\\Radio',
            'show' => '\\Rtds\\FirstLevel\\Show',
            'stream' => '\\Rtds\\FirstLevel\\Stream',
            'tags' => '\\Rtds\\FirstLevel\\Tags'
        ];
        foreach ($array as $key => $value) {
            $class = $classes[$key];
	    $object = (new $class);
	    $object->bind($value);
            $this->{$key} = $object;
        }
        return $this;
    }

    public function jsonSerialize() {
        return $this->structure;
    }
}
