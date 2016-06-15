<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeptStruct
 *
 * @ORM\Table(name="dept_struct")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\DeptStructRepository")
 */
class DeptStruct
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
     * @ORM\Column(name="dept_title", type="string", length=255)
     */
    private $deptTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="dept_alias", type="string", length=255)
     */
    private $deptAlias;


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
     * @return DeptStruct
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
     * Set deptTitle
     *
     * @param string $deptTitle
     *
     * @return DeptStruct
     */
    public function setDeptTitle($deptTitle)
    {
        $this->deptTitle = $deptTitle;

        return $this;
    }

    /**
     * Get deptTitle
     *
     * @return string
     */
    public function getDeptTitle()
    {
        return $this->deptTitle;
    }

    /**
     * Set deptAlias
     *
     * @param string $deptAlias
     *
     * @return DeptStruct
     */
    public function setDeptAlias($deptAlias)
    {
        $this->deptAlias = $deptAlias;

        return $this;
    }

    /**
     * Get deptAlias
     *
     * @return string
     */
    public function getDeptAlias()
    {
        return $this->deptAlias;
    }
}

