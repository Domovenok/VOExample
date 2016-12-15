<?php
namespace AppBundle\Entity;

use AppBundle\VO\PostalValueObject;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class Address
{
    /** @ORM\Column(type = "string") */
    private $street;

    /** @ORM\Column(type = "string") */
    private $postalCode;

    /** @ORM\Column(type = "string") */
    private $city;

    /** @ORM\Column(type = "string") */
    private $country;

    public function __construct($aStreet, PostalValueObject $aCode, $aCity, $aCountry)
    {
        $this->street = $aStreet;
        $this->postalCode = $aCode;
        $this->city = $aCity;
        $this->country = $aCountry;
    }
}