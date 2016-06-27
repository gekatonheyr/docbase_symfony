<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activities
 *
 * @ORM\Table(name="activities")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\ActivitiesRepository")
 */
class Activities
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="successor_table", type="string", length=255, nullable=true)
     */
    private $successorTable;

    /**
     * @var int
     *
     * @ORM\Column(name="dept_id", type="integer")
     */
    private $deptId;

    /**
     * @var int
     *
     * @ORM\Column(name="cell_id", type="integer", nullable=true)
     */
    private $cellId;

    /**
     * @var bool
     *
     * @ORM\Column(name="has_subnodes", type="boolean")
     */
    private $hasSubnodes;

    /**
     * @var int
     *
     * @ORM\Column(name="employee_id", type="integer", nullable=true)
     */
    private $employeeId;

    /**
     * @var int
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    private $parentId;


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
     * Set title
     *
     * @param string $title
     *
     * @return Activities
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
     * @return Activities
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
     * Set successorTable
     *
     * @param string $successorTable
     *
     * @return Activities
     */
    public function setSuccessorTable($successorTable)
    {
        $this->successorTable = $successorTable;

        return $this;
    }

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
     * Set deptId
     *
     * @param integer $deptId
     *
     * @return Activities
     */
    public function setDeptId($deptId)
    {
        $this->deptId = $deptId;

        return $this;
    }

    /**
     * Get deptId
     *
     * @return int
     */
    public function getDeptId()
    {
        return $this->deptId;
    }

    /**
     * Set cellId
     *
     * @param integer $cellId
     *
     * @return Activities
     */
    public function setCellId($cellId)
    {
        $this->cellId = $cellId;

        return $this;
    }

    /**
     * Get cellId
     *
     * @return int
     */
    public function getCellId()
    {
        return $this->cellId;
    }

    /**
     * Set hasSubnodes
     *
     * @param boolean $hasSubnodes
     *
     * @return Activities
     */
    public function setHasSubnodes($hasSubnodes)
    {
        $this->hasSubnodes = $hasSubnodes;

        return $this;
    }

    /**
     * Get hasSubnodes
     *
     * @return bool
     */
    public function getHasSubnodes()
    {
        return $this->hasSubnodes;
    }

    /**
     * Set employeeId
     *
     * @param integer $employeeId
     *
     * @return Activities
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    /**
     * Get employeeId
     *
     * @return int
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return Activities
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }
}

