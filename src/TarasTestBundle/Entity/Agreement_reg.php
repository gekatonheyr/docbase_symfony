<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agreement_reg
 *
 * @ORM\Table(name="agreement_reg")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\Agreement_regRepository")
 */
class Agreement_reg
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
     * @ORM\Column(name="contractor_id", type="integer")
     */
    private $contractorId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="conclusion_date", type="date")
     */
    private $conclusionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="agreement_subject", type="string", length=255)
     */
    private $agreementSubject;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="completion_date", type="date", nullable=true)
     */
    private $completionDate;

    /**
     * @var int
     *
     * @ORM\Column(name="maindoc_id", type="integer", nullable=true)
     */
    private $maindocId;

    /**
     * @var string
     *
     * @ORM\Column(name="scan_path", type="string", length=255, nullable=true)
     */
    private $scanPath;


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
     * Set contractorId
     *
     * @param integer $contractorId
     *
     * @return Agreement_reg
     */
    public function setContractorId($contractorId)
    {
        $this->contractorId = $contractorId;

        return $this;
    }

    /**
     * Get contractorId
     *
     * @return int
     */
    public function getContractorId()
    {
        return $this->contractorId;
    }

    /**
     * Set conclusionDate
     *
     * @param \DateTime $conclusionDate
     *
     * @return Agreement_reg
     */
    public function setConclusionDate($conclusionDate)
    {
        $this->conclusionDate = $conclusionDate;

        return $this;
    }

    /**
     * Get conclusionDate
     *
     * @return \DateTime
     */
    public function getConclusionDate()
    {
        return $this->conclusionDate;
    }

    /**
     * Set agreementSubject
     *
     * @param string $agreementSubject
     *
     * @return Agreement_reg
     */
    public function setAgreementSubject($agreementSubject)
    {
        $this->agreementSubject = $agreementSubject;

        return $this;
    }

    /**
     * Get agreementSubject
     *
     * @return string
     */
    public function getAgreementSubject()
    {
        return $this->agreementSubject;
    }

    /**
     * Set completionDate
     *
     * @param \DateTime $completionDate
     *
     * @return Agreement_reg
     */
    public function setCompletionDate($completionDate)
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    /**
     * Get completionDate
     *
     * @return \DateTime
     */
    public function getCompletionDate()
    {
        return $this->completionDate;
    }

    /**
     * Set maindocId
     *
     * @param integer $maindocId
     *
     * @return Agreement_reg
     */
    public function setMaindocId($maindocId)
    {
        $this->maindocId = $maindocId;

        return $this;
    }

    /**
     * Get maindocId
     *
     * @return int
     */
    public function getMaindocId()
    {
        return $this->maindocId;
    }

    /**
     * Set scanPath
     *
     * @param string $scanPath
     *
     * @return Agreement_reg
     */
    public function setScanPath($scanPath)
    {
        $this->scanPath = $scanPath;

        return $this;
    }

    /**
     * Get scanPath
     *
     * @return string
     */
    public function getScanPath()
    {
        return $this->scanPath;
    }
}

