<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contractor
 *
 * @ORM\Table(name="contractor")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\ContractorRepository")
 */
class Contractor
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
     * @ORM\Column(name="org_form", type="string", length=255)
     */
    private $orgForm;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="EDRPOU", type="string", length=12, unique=true)
     */
    private $eDRPOU;

    /**
     * @var string
     *
     * @ORM\Column(name="IPN", type="string", length=14, nullable=true, unique=true)
     */
    private $iPN;

    /**
     * @var string
     *
     * @ORM\Column(name="account", type="string", length=20, unique=true)
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="bank", type="string", length=255)
     */
    private $bank;

    /**
     * @var string
     *
     * @ORM\Column(name="MFO", type="string", length=12)
     */
    private $mFO;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_nubers", type="string", length=255)
     */
    private $telNubers;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=255)
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="responsible_person", type="string", length=255)
     */
    private $responsiblePerson;


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
     * Set orgForm
     *
     * @param string $orgForm
     *
     * @return Contractor
     */
    public function setOrgForm($orgForm)
    {
        $this->orgForm = $orgForm;

        return $this;
    }

    /**
     * Get orgForm
     *
     * @return string
     */
    public function getOrgForm()
    {
        return $this->orgForm;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Contractor
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Contractor
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
     * Set eDRPOU
     *
     * @param string $eDRPOU
     *
     * @return Contractor
     */
    public function setEDRPOU($eDRPOU)
    {
        $this->eDRPOU = $eDRPOU;

        return $this;
    }

    /**
     * Get eDRPOU
     *
     * @return string
     */
    public function getEDRPOU()
    {
        return $this->eDRPOU;
    }

    /**
     * Set iPN
     *
     * @param string $iPN
     *
     * @return Contractor
     */
    public function setIPN($iPN)
    {
        $this->iPN = $iPN;

        return $this;
    }

    /**
     * Get iPN
     *
     * @return string
     */
    public function getIPN()
    {
        return $this->iPN;
    }

    /**
     * Set account
     *
     * @param string $account
     *
     * @return Contractor
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set bank
     *
     * @param string $bank
     *
     * @return Contractor
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set mFO
     *
     * @param string $mFO
     *
     * @return Contractor
     */
    public function setMFO($mFO)
    {
        $this->mFO = $mFO;

        return $this;
    }

    /**
     * Get mFO
     *
     * @return string
     */
    public function getMFO()
    {
        return $this->mFO;
    }

    /**
     * Set telNubers
     *
     * @param string $telNubers
     *
     * @return Contractor
     */
    public function setTelNubers($telNubers)
    {
        $this->telNubers = $telNubers;

        return $this;
    }

    /**
     * Get telNubers
     *
     * @return string
     */
    public function getTelNubers()
    {
        return $this->telNubers;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return Contractor
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set responsiblePerson
     *
     * @param string $responsiblePerson
     *
     * @return Contractor
     */
    public function setResponsiblePerson($responsiblePerson)
    {
        $this->responsiblePerson = $responsiblePerson;

        return $this;
    }

    /**
     * Get responsiblePerson
     *
     * @return string
     */
    public function getResponsiblePerson()
    {
        return $this->responsiblePerson;
    }
}

