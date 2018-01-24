<?php namespace Rtds\FirstLevel;

use Rtds\JsonHandler;

class Stream extends JsonHandler {
    protected $type;
    protected $format;
    protected $quality;
    protected $channels;
    protected $url;

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

    public function getQuality(): int {
        return $this->quality;
    }

    public function setQuality(int $quality) {
        $this->quality = $quality;
    }

    public function getChannels(): int {
        return $this->channels;
    }

    public function setChannels(int $channels) {
        $this->channels = $channels;
    }

    public function getUrl(): String {
        return $this->url;
    }

    public function setUrl(String $url) {
        $this->url = $url;
    }
}
