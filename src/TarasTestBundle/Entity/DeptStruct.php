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
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="successor_table", type="string", length=255)
     */
    private $successorTable;

    /**
     * Get successorTable
     *
     * @return string
     */
    public function getSuccessorTable()
    {
        return $this->successorTable;
    }

    /**
     * Set successorTable
     *
     * @param string $successorTable
     *
     * @return DeptStruct
     */
    public function setSuccessorTable($successorTable)
    {
        $this->successorTable = $successorTable;
        return $this;
    }


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
     * Set alias
     *
     * @param string $alias
     *
     * @return DeptStruct
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
}

