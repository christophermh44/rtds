<?php
/**
 * Created by IntelliJ IDEA.
 * User: christopher.machicoane-hurtaud
 * Date: 24/01/18
 * Time: 15:10
 */

namespace Rtds;


use Rtds\Shared\Contributor;
use Rtds\Shared\Coordinates;
use Rtds\Shared\Image;
use Rtds\Shared\Phone;
use Rtds\Shared\Recurrence;

abstract class JsonHandler {
    public function bind(array $array): JsonHandler {
        foreach ($array as $key => $value) {
            if ($key === 'recurrences') {
                $recurrences = [];
                foreach ($value as $v) {
                    $recurrence = new Recurrence();
                    $recurrence->bind($v);
                    $recurrences[] = $recurrence;
                }
                $this->setRecurrences($recurrences);
            } else if ($key === 'contributors') {
                $contributors = [];
                foreach ($value as $v) {
                    $contributor = new Contributor();
                    $contributor->bind($v);
                    $contributors[] = $contributor;
                }
                $this->setContributors($contributors);
            } else if ($key === 'images') {
                $images = [];
                foreach ($value as $v) {
                    $image = new Image();
                    $image->bind($v);
                    $images[] = $image;
                }
                $this->setImages($images);
            } else if ($key === 'phones') {
                $phones = [];
                foreach ($value as $v) {
                    $phone = new Phone();
                    $phone->bind($v);
                    $phones[] = $phone;
                }
                $this->setPhones($phones);
            } else if ($key === 'coordinates') {
                $coordinates = new Coordinates();
                $coordinates->bind($value);
                $this->setCoordinates($coordinates);
            } else {
                $this->{$key} = $value;
            }
        }
    }
}
