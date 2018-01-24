<?php namespace Rtds\Shared;

use Rtds\Exception;
use Rtds\JsonHandler;
use Rtds\Util\RichUrl;

class Urls extends JsonHandler {
    protected $self;
    protected $web;
    protected $parent;
    protected $player;
    protected $listen;
    protected $legal_notice;
    protected $contact;
    protected $social;
    protected $buy;
    protected $stream;
    protected $extra;

    public function getSelf(): String {
        return $this->self;
    }

    public function setSelf(String $self) {
        $this->self = $self;
    }

    public function getWeb(): String {
        return $this->web;
    }

    public function setWeb(String $web) {
        $this->web = $web;
    }

    public function getParent(): String {
        return $this->parent;
    }

    public function setParent(String $parent) {
        $this->parent = $parent;
    }

    public function getPlayer(): String {
        return $this->player;
    }

    public function setPlayer(String $player) {
        $this->player = $player;
    }

    public function getListen(): String {
        return $this->listen;
    }

    public function setListen(String $listen) {
        $this->listen = $listen;
    }

    public function getLegalNotice(): String {
        return $this->legal_notice;
    }

    public function setLegalNotice(String $legal_notice) {
        $this->legal_notice = $legal_notice;
    }

    public function getContact(): String {
        return $this->contact;
    }

    public function setContact(String $contact) {
        $this->contact = $contact;
    }

    public function getSocial(): array { // RichUrl[]
        return $this->social;
    }

    public function setSocial(array $social) { // RichUrl[]
        foreach ($social as $url) {
            if (!($url instanceof RichUrl)) {
                throw new Exception('Error while adding social in Urls object.');
            }
        }
        $this->social = $social;
    }

    public function getBuy(): array { // RichUrl[]
        return $this->buy;
    }

    public function setBuy(array $buy) { // RichUrl[]
        foreach ($buy as $url) {
            if (!($url instanceof RichUrl)) {
                throw new Exception('Error while adding buy in Urls object.');
            }
        }
        $this->buy = $buy;
    }

    public function getStream(): array { // RichUrl[]
        return $this->stream;
    }

    public function setStream(array $stream) { // RichUrl[]
        foreach ($stream as $url) {
            if (!($url instanceof RichUrl)) {
                throw new Exception('Error while adding stream in Urls object.');
            }
        }
        $this->stream = $stream;
    }

    public function getExtra(): array {
        return $this->extra;
    }

    public function setExtra(array $extra) {
        $this->extra = $extra;
    }

    public function bind(array $array): JsonHandler {
        foreach ($array as $key => $value) {
            if ($key === 'social') {
                $urls = [];
                foreach ($value as $v) {
                    $url = new RichUrl();
                    $url->bind($v);
                    $urls[] = $url;
                }
                $this->setSocial($urls);
            } else if ($key === 'buy') {
                $urls = [];
                foreach ($value as $v) {
                    $url = new RichUrl();
                    $url->bind($v);
                    $urls[] = $url;
                }
                $this->setBuy($urls);
            } else if ($key === 'stream') {
                $urls = [];
                foreach ($value as $v) {
                    $url = new RichUrl();
                    $url->bind($v);
                    $urls[] = $url;
                }
                $this->setStream($urls);
            } else {
                $this->{$key} = $value;
            }
        }
        return $this;
    }
}
