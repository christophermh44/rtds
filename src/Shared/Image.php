<?php namespace Rtds\Shared;

use Rtds\JsonHandler;

class Image extends JsonHandler {
    protected $type;
    protected $format;
    protected $transparency;
    protected $url;
    protected $width;
    protected $height;

    public function getType(): String {
        return $this->type;
    }

    public function setType(String $type) {
        $this->type = $type;
    }

    public function getFormat(): String {
        return $this->format;
    }

    public function setFormat(String $format) {
        $this->format = $format;
    }

    public function getTransparency(): bool {
        return $this->transparency;
    }

    public function setTransparency(bool $transparency) {
        $this->transparency = $transparency;
    }

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
