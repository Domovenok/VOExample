<?php
namespace AppBundle\VO;

final class EmailValueObject
{
    private $mailbox;
    private $host;

    public function __construct($email)
    {
        if (false === strpos($email, '@')) {
            throw new \InvalidArgumentException('This does not look like an email');
        }

        list($this->mailbox, $this->host) = explode('@', $email);
    }

    public function __toString()
    {
        return sprintf('%s@%s', $this->mailbox, $this->host);
    }

    public function __set($field, $value)
    {
    }

    public function changeMailbox($newMailbox)
    {
        $copy = clone $this;
        $copy->mailbox = $newMailbox;
        return $copy;
    }
}