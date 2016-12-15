<?php
namespace AppBundle\Entity;

use AppBundle\VO\PhoneValueObject;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\VO\EmailValueObject;

/** @ORM\Embeddable */
class Person
{
    /** @ORM\Column(type = "string") */
    private $name;

    /** @ORM\Column(type = "string") */
    private $last_name;

    /** @ORM\Column(type = "string") */
    private $phone;

    /**
     * @ORM\Column(type = "string")
     * @ORM\Embedded(class = "EmailValueObject")
     */
    private $email;

    public function __construct($aName, $aLastName, PhoneValueObject $aPhone, EmailValueObject $anEmail)
    {
        $this->name = $aName;
        $this->last_name = $aLastName;
        $this->phone = $aPhone;
        $this->email = $anEmail;
    }
}