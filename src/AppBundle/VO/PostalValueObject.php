<?php
namespace AppBundle\VO;

class PostalValueObject
{
    private $code;

    public function __construct($aCode)
    {
        $this->code = $aCode;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function __toString()
    {
        return $this->code;
    }
}