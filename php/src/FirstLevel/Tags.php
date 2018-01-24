<?php namespace Rtds\FirstLevel;

use Rtds\Exception;
use Rtds\JsonHandler;
use Rtds\Shared\Urls;
use Rtds\Util\Cover;

class Tags extends JsonHandler {
    private $artists;
    private $title;
    private $album;
    private $year;
    private $cover;
    private $genres;
    private $categories;
    private $length;
    private $remaining;
    private $urls;
    private $extra;
    private $previous;
    private $next;

    public function getArtists(): array { // String[]
        return $this->artists;
    }

    public function setArtists(array $artists) { // String[]
        foreach ($artists as $artist) {
            if (!(is_string($artist))) {
                throw new Exception('Error while adding artists in Tags object.');
            }
        }
        $this->artists = $artists;
    }

    public function getTitle(): String {
        return $this->title;
    }

    public function setTitle(String $title) {
        $this->title = $title;
    }

    public function getAlbum(): String {
        return $this->album;
    }

    public function setAlbum(String $album) {
        $this->album = $album;
    }

    public function getYear(): int {
        return $this->year;
    }

    public function setYear(int $year) {
        $this->year = $year;
    }

    public function getCover(): Cover {
        return $this->cover;
    }

    public function setCover(Cover $cover) {
        $this->cover = $cover;
    }

    public function getGenres(): array { // String[]
        return $this->genres;
    }

    public function setGenres(array $genres) { // String[]
        foreach ($genres as $genre) {
            if (!(is_string($genre))) {
                throw new Exception('Error while adding genres in Tags object.');
            }
        }
        $this->genres = $genres;
    }

    public function getCategories(): array { // String[]
        return $this->categories;
    }

    public function setCategories(array $categories) { // String[]
        foreach ($categories as $category) {
            if (!(is_string($category))) {
                throw new Exception('Error while adding categories in Tags object.');
            }
        }
        $this->categories = $categories;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function setLength(float $length) {
        $this->length = $length;
    }

    public function getRemaining(): float {
        return $this->remaining;
    }

    public function setRemaining(float $remaining) {
        $this->remaining = $remaining;
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

    public function getPrevious(): Tags {
        return $this->previous;
    }

    public function setPrevious(Tags $previous) {
        $this->previous = $previous;
    }

    public function getNext(): Tags {
        return $this->next;
    }

    public function setNext(Tags $next) {
        $this->next = $next;
    }
}
