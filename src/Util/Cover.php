<?php namespace Rtds\Util;

use Rtds\RtdsObject;

class Cover extends RtdsObject {
    private $url;
    private $width;
    private $height;

    public function getUrl(): String {
        return $this->url;
    }

    public function setUrl(String $url) {
        $this->url = $url;
    }

    public function getWidth(): int {
        return $this->width;
    }

    public function setWidth(int $width) {
        $this->width = $width;
    }

    public function getHeight(): int {
        return $this->height;
    }

    public function setHeight(int $height) {
        $this->height = $height;
    }
}
