<?php namespace Rtds\FirstLevel;

use Rtds\Exception;
use Rtds\JsonHandler;
use Rtds\Shared\Coordinates;
use Rtds\Shared\Image;
use Rtds\Shared\Urls;

class Radio extends JsonHandler {
    protected $name;
    protected $slogan;
    protected $description;
    protected $images;
    protected $coordinates;
    protected $genres;
    protected $urls;
    protected $extra;

    public function getName(): String {
        return $this->name;
    }

    public function setName(String $name) {
        $this->name = $name;
    }

    public function getSlogan(): String {
        return $this->slogan;
    }

    public function setSlogan(String $slogan) {
        $this->slogan = $slogan;
    }

    public function getDescription(): String {
        return $this->description;
    }

    public function setDescription(String $description) {
        $this->description = $description;
    }

    public function getImages(): array { // Image[]
        return $this->images;
    }

    public function setImages(array $images) { // Image[]
        foreach ($images as $image) {
            if (!($image instanceof Image)) {
                throw new Exception('Error while adding images in Radio object.');
            }
        }
        $this->images = $images;
    }

    public function getCoordinates(): Coordinates {
        return $this->coordinates;
    }

    public function setCoordinates(Coordinates $coordinates) {
        $this->coordinates = $coordinates;
    }

    public function getGenres(): array {
        return $this->genres;
    }

    public function setGenres(array $genres) {
        $this->genres = $genres;
    }

    public function getUrls(): Urls {
        return $this->urls;
    }

    public function setUrls(Urls $urls) {
        $this->urls = $urls;
    }

    public function getExtra(): array {
        return $this->extra;
    }

    public function setExtra(array $extra) {
        $this->extra = $extra;
    }
}
