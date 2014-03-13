<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlEphorusAssignment
 *
 * @ORM\Table(name="mdl_ephorus_assignment")
 * @ORM\Entity
 */
class MdlEphorusAssignment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="assignment", type="string", length=50, nullable=true)
     */
    private $assignment;

    /**
     * @var string
     *
     * @ORM\Column(name="processtype", type="string", length=50, nullable=true)
     */
    private $processtype;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set assignment
     *
     * @param string $assignment
     * @return MdlEphorusAssignment
     */
    public function setAssignment($assignment)
    {
        $this->assignment = $assignment;

        return $this;
    }

    /**
     * Get assignment
     *
     * @return string 
     */
    public function getAssignment()
    {
        return $this->assignment;
    }

    /**
     * Set processtype
     *
     * @param string $processtype
     * @return MdlEphorusAssignment
     */
    public function setProcesstype($processtype)
    {
        $this->processtype = $processtype;

        return $this;
    }

    /**
     * Get processtype
     *
     * @return string 
     */
    public function getProcesstype()
    {
        return $this->processtype;
    }
}
