<?php
namespace AppBundle\VO;

class PhoneValueObject
{
    private $phone;

    public function __construct($aPhone)
    {
        $this->phone = $aPhone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function __toString()
    {
        return $this->phone;
    }
}