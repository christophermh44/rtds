<?php namespace Rtds\Shared;

use Rtds\Exception;
use Rtds\JsonHandler;

class Coordinates extends JsonHandler {
    protected $type;
    protected $organisation;
    protected $address;
    protected $zip;
    protected $city;
    protected $country;
    protected $phones;

    public function getType(): String {
        return $this->type;
    }

    public function setType(String $type) {
        $this->type = $type;
    }

    public function getOrganisation(): String {
        return $this->organisation;
    }

    public function setOrganisation(String $organisation) {
        $this->organisation = $organisation;
    }

    public function getAddress(): String {
        return $this->address;
    }

    public function setAddress(String $address) {
        $this->address = $address;
    }

    public function getZip(): String {
        return $this->zip;
    }

    public function setZip(String $zip) {
        $this->zip = $zip;
    }

    public function getCity(): String {
        return $this->city;
    }

    public function setCity(String $city) {
        $this->city = $city;
    }

    public function getCountry(): String {
        return $this->country;
    }

    public function setCountry(String $country) {
        $this->country = $country;
    }

    public function getPhones(): array { // Phone[]
        return $this->phones;
    }

    public function setPhones(array $phones) { // Phone[]
        foreach ($phones as $phone) {
            if (!(is_string($phone))) {
                throw new Exception('Error while adding phones in Coordinates object.');
            }
        }
        $this->phones = $phones;
    }
}
