<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaStructure
 *
 * @ORM\Table(name="meta_structure")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\MetaStructureRepository")
 */
class MetaStructure
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
     * @ORM\Column(name="alias", type="string", length=255, unique=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="successor_table", type="string", length=255, nullable=true)
     */
    private $successorTable;


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
     * @return MetaStructure
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
     * @return MetaStructure
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
     * @return MetaStructure
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
}

