<?php namespace Rtds\Shared;

use Rtds\Exception;

class Contributor {
    private $name;
    private $roles;
    private $images;
    private $urls;

    public function getName(): String {
        return $this->name;
    }

    public function setName(String $name) {
        $this->name = $name;
    }

    public function getRoles(): array { // String[]
        return $this->roles;
    }

    public function setRoles(array $roles) { // String[]
        foreach ($roles as $role) {
            if (!(is_string($role))) {
                throw new Exception('Error while adding roles in Contributor object.');
            }
        }
        $this->roles = $roles;
    }

    public function getImages(): array { // Image[]
        return $this->images;
    }

    public function setImages($images) { // Image[]
        foreach ($images as $image) {
            if (!($image instanceof Image)) {
                throw new Exception('Error while adding images in Contributor object.');
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
}
