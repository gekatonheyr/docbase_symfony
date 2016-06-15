<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HoldingStruct
 *
 * @ORM\Table(name="holding_struct")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\HoldingStructRepository")
 */
class HoldingStruct
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
     * @ORM\Column(name="cg_name", type="string", length=255)
     */
    private $cgName;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    /**
     * @var int
     *
     * @ORM\Column(name="main_company_id", type="integer")
     */
    private $mainCompanyId;

    /**
     * @var int
     *
     * @ORM\Column(name="enterprise_id", type="integer")
     */
    private $enterpriseId;


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
     * Set cgName
     *
     * @param string $cgName
     *
     * @return HoldingStruct
     */
    public function setCgName($cgName)
    {
        $this->cgName = $cgName;

        return $this;
    }

    /**
     * Get cgName
     *
     * @return string
     */
    public function getCgName()
    {
        return $this->cgName;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return HoldingStruct
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
     * Set mainCompanyId
     *
     * @param integer $mainCompanyId
     *
     * @return HoldingStruct
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
     * Set enterpriseId
     *
     * @param integer $enterpriseId
     *
     * @return HoldingStruct
     */
    public function setEnterpriseId($enterpriseId)
    {
        $this->enterpriseId = $enterpriseId;

        return $this;
    }

    /**
     * Get enterpriseId
     *
     * @return int
     */
    public function getEnterpriseId()
    {
        return $this->enterpriseId;
    }
}

