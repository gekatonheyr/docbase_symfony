<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enterprises
 *
 * @ORM\Table(name="enterprises")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\EnterprisesRepository")
 */
class Enterprises
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
     * @var int
     *
     * @ORM\Column(name="holding_id", type="integer")
     */
    private $holdingId;

    /**
     * @var string
     *
     * @ORM\Column(name="organisation_form", type="string", length=255)
     */
    private $organisationForm;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, unique=true)
     */
    private $alias;

    /**
     * @var int
     *
     * @ORM\Column(name="EDRPOU", type="integer", unique=true)
     */
    private $eDRPOU;

    /**
     * @var string
     *
     * @ORM\Column(name="IPN", type="string", length=255, unique=true)
     */
    private $iPN;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="banc_acc", type="string", length=255, nullable=true)
     */
    private $bancAcc;

    /**
     * @var string
     *
     * @ORM\Column(name="bank_title", type="string", length=255)
     */
    private $bankTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="reg_address", type="string", length=255)
     */
    private $regAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="real_address", type="string", length=255)
     */
    private $realAddress;

    /**
     * @var int
     *
     * @ORM\Column(name="main_company_id", type="integer", nullable=true)
     */
    private $mainCompanyId;

    /**
     * @var int
     *
     * @ORM\Column(name="ceo_id", type="integer")
     */
    private $ceoId;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    private $site;


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
     * Set holdingId
     *
     * @param integer $holdingId
     *
     * @return Enterprises
     */
    public function setHoldingId($holdingId)
    {
        $this->holdingId = $holdingId;

        return $this;
    }

    /**
     * Get holdingId
     *
     * @return int
     */
    public function getHoldingId()
    {
        return $this->holdingId;
    }

    /**
     * Set organisationForm
     *
     * @param string $organisationForm
     *
     * @return Enterprises
     */
    public function setOrganisationForm($organisationForm)
    {
        $this->organisationForm = $organisationForm;

        return $this;
    }

    /**
     * Get organisationForm
     *
     * @return string
     */
    public function getOrganisationForm()
    {
        return $this->organisationForm;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Enterprises
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
     * Set alias
     *
     * @param string $alias
     *
     * @return Enterprises
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set eDRPOU
     *
     * @param integer $eDRPOU
     *
     * @return Enterprises
     */
    public function setEDRPOU($eDRPOU)
    {
        $this->eDRPOU = $eDRPOU;

        return $this;
    }

    /**
     * Get eDRPOU
     *
     * @return int
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
     * @return Enterprises
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
     * Set email
     *
     * @param string $email
     *
     * @return Enterprises
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Enterprises
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Enterprises
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set bancAcc
     *
     * @param string $bancAcc
     *
     * @return Enterprises
     */
    public function setBancAcc($bancAcc)
    {
        $this->bancAcc = $bancAcc;

        return $this;
    }

    /**
     * Get bancAcc
     *
     * @return string
     */
    public function getBancAcc()
    {
        return $this->bancAcc;
    }

    /**
     * Set bankTitle
     *
     * @param string $bankTitle
     *
     * @return Enterprises
     */
    public function setBankTitle($bankTitle)
    {
        $this->bankTitle = $bankTitle;

        return $this;
    }

    /**
     * Get bankTitle
     *
     * @return string
     */
    public function getBankTitle()
    {
        return $this->bankTitle;
    }

    /**
     * Set regAddress
     *
     * @param string $regAddress
     *
     * @return Enterprises
     */
    public function setRegAddress($regAddress)
    {
        $this->regAddress = $regAddress;

        return $this;
    }

    /**
     * Get regAddress
     *
     * @return string
     */
    public function getRegAddress()
    {
        return $this->regAddress;
    }

    /**
     * Set realAddress
     *
     * @param string $realAddress
     *
     * @return Enterprises
     */
    public function setRealAddress($realAddress)
    {
        $this->realAddress = $realAddress;

        return $this;
    }

    /**
     * Get realAddress
     *
     * @return string
     */
    public function getRealAddress()
    {
        return $this->realAddress;
    }

    /**
     * Set mainCompanyId
     *
     * @param integer $mainCompanyId
     *
     * @return Enterprises
     */
    public function setMainCompanyId($mainCompanyId)
    {
        $this->mainCompanyId = $mainCompanyId;

        return $this;
    }

    /**
     * Get mainCompanyId
     *
     * @return int
     */
    public function getMainCompanyId()
    {
        return $this->mainCompanyId;
    }

    /**
     * Set ceoId
     *
     * @param integer $ceoId
     *
     * @return Enterprises
     */
    public function setCeoId($ceoId)
    {
        $this->ceoId = $ceoId;

        return $this;
    }

    /**
     * Get ceoId
     *
     * @return int
     */
    public function getCeoId()
    {
        return $this->ceoId;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return Enterprises
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }
}

