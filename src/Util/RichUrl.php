<?php namespace Rtds\Util;

class RichUrl extends RtdsObject {
    protected $type;
    protected $description;
    protected $url;

    public function getType(): String {
        return $this->type;
    }

    public function setType(String $type) {
        $this->type = $type;
    }

    public function getDescription(): String {
        return $this->description;
    }

    public function setDescription(String $description) {
        $this->description = $description;
    }

    public function getUrl(): String {
        return $this->url;
    }

    public function setUrl(String $url) {
        $this->url = $url;
    }
}
