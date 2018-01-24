<?php namespace Rtds\FirstLevel;

use Rtds\Exception;
use Rtds\Shared\Contributor;
use Rtds\Shared\Image;
use Rtds\Shared\Phone;
use Rtds\Shared\Recurrence;
use Rtds\Shared\Urls;

class Show {
    private $name;
    private $description;
    private $recurrences;
    private $contributors;
    private $images;
    private $urls;
    private $phones;
    private $extra;

    public function getName(): String {
        return $this->name;
    }

    public function setName(String $name) {
        $this->name = $name;
    }

    public function getDescription(): String {
        return $this->description;
    }

    public function setDescription(String $description) {
        $this->description = $description;
    }

    public function getRecurrences(): array { // Recurrence[]
        return $this->recurrences;
    }

    public function setRecurrences(array $recurrences) { // Recurrence[]
        foreach ($recurrences as $recurrence) {
            if (!($recurrence instanceof Recurrence)) {
                throw new Exception('Error while adding recurrences in Show object.');
            }
        }
        $this->recurrences = $recurrences;
    }

    public function getContributors(): array { // Contributors[]
        return $this->contributors;
    }

    public function setContributors(array $contributors) { // Contributors[]
        foreach ($contributors as $contributor) {
            if (!($contributor instanceof Contributor)) {
                throw new Exception('Error while adding contributors in Show object.');
            }
        }
        $this->contributors = $contributors;
    }

    public function getImages(): array { // Image[]
        return $this->images;
    }

    public function setImages(array $images) { // Image[]
        foreach ($images as $image) {
            if (!($image instanceof Image)) {
                throw new Exception('Error while adding images in Show object');
            }
        }
        $this->images = $images;
    }

    public function getUrls(): Urls {
        return $this->urls;
    }

    public function setUrls(Urls $urls) {
        $this->urls = $urls;
    }

    public function getPhones(): array { // Phone[]
        return $this->phones;
    }

    public function setPhones(array $phones) { // Phone[]
        foreach ($phones as $phone) {
            if (!($phone instanceof Phone)) {
                throw new Exception('Error while adding phones in Show object.');
            }
        }
        $this->phones = $phones;
    }

    public function getExtra(): array {
        return $this->extra;
    }

    public function setExtra(array $extra) {
        $this->extra = $extra;
    }
}
