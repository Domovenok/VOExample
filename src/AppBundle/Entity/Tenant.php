<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tenant
 *
 * @ORM\Table(name="tenant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TenantRepository")
 */
class Tenant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Embedded(class = "Address", columnPrefix = "address_")
     */
    private $address;

    /**
     * @ORM\Embedded(class = "Person", columnPrefix = "person_")
     */
    private $person;

    public function __construct()
    {
//        $this->address = new Address();
//        $this->person = new Person();
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Tenant
     */
    public function setAddress(\AppBundle\Entity\Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Tenant
     */
    public function setPerson(\AppBundle\Entity\Person $person)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \AppBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
