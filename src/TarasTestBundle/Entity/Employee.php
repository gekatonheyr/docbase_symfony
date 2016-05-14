<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=20)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=50)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="connect_data", type="string", length=255)
     */
    private $connectData;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date")
     */
    private $birthDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Employee
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Employee
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set connectData
     *
     * @param string $connectData
     *
     * @return Employee
     */
    public function setConnectData($connectData)
    {
        $this->connectData = $connectData;

        return $this;
    }

    /**
     * Get connectData
     *
     * @return string
     */
    public function getConnectData()
    {
        return $this->connectData;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Employee
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }
}

