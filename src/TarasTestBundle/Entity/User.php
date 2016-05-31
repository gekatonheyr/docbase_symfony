<?php

namespace TarasTestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="TarasTestBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="login", type="string", length=20, unique=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password_hash", type="string", length=40)
     */
    private $passwordHash;

    /**
     * @var int
     *
     * @ORM\Column(name="employee_id", type="integer")
     */
    private $employeeId;

    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer")
     */
    private $groupId;

    /**
     * @var int
     *
     * @ORM\Column(name="groups_id", type="integer", nullable=true)
     */
    private $groupsId;

    /**
     * @var int
     *
     * @ORM\Column(name="salt", type="integer", nullable=true)
     */
    private $salt;

    /**
     * @var int
     *
     * @ORM\Column(name="access_id", type="integer", nullable=false)
     */
    private $accessId;

    /**
     * @var string
     *
     * @ORM\Column(name="last_visited", type="string", length=255)
     */
    private $lastVisited;

    /**
     * @return string
     */
    public function getLastVisited()
    {
        return $this->lastVisited;
    }

    /**
     * @param string $lastVisited
     */
    public function setLastVisited($lastVisited)
    {
        $this->lastVisited = $lastVisited;
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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set passwordHash
     *
     * @param string $passwordHash
     *
     * @return User
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;

        return $this;
    }

    /**
     * Get passwordHash
     *
     * @return string
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * Set employeeId
     *
     * @param integer $employeeId
     *
     * @return User
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
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return User
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set groupsId
     *
     * @param integer $groupsId
     *
     * @return User
     */
    public function setGroupsId($groupsId)
    {
        $this->groupsId = $groupsId;

        return $this;
    }

    /**
     * Get groupsId
     *
     * @return int
     */
    public function getGroupsId()
    {
        return $this->groupsId;
    }

    /**
     * Set salt
     *
     * @param integer $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return int
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set accessId
     *
     * @param integer $accessId
     *
     * @return User
     */
    public function setAccessId($accessId)
    {
        $this->accessId = $accessId;

        return $this;
    }

    /**
     * Get accessId
     *
     * @return integer
     */
    public function getAccessId()
    {
        return $this->accessId;
    }

    public function generateSalt($em)
    {
        $salt = rand();
        $this->setSalt($salt);
        $em->flush();
        return $salt;
    }
}
