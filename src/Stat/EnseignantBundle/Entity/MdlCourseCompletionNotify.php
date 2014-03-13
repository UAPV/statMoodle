<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlCourseCompletionNotify
 *
 * @ORM\Table(name="mdl_course_completion_notify", indexes={@ORM\Index(name="mdl_courcompnoti_cou_ix", columns={"course"})})
 * @ORM\Entity
 */
class MdlCourseCompletionNotify
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
     * @var integer
     *
     * @ORM\Column(name="course", type="bigint", nullable=false)
     */
    private $course = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="role", type="bigint", nullable=false)
     */
    private $role = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=false)
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="timesent", type="bigint", nullable=false)
     */
    private $timesent = '0';



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
     * Set course
     *
     * @param integer $course
     * @return MdlCourseCompletionNotify
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return integer 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set role
     *
     * @param integer $role
     * @return MdlCourseCompletionNotify
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return integer 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return MdlCourseCompletionNotify
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set timesent
     *
     * @param integer $timesent
     * @return MdlCourseCompletionNotify
     */
    public function setTimesent($timesent)
    {
        $this->timesent = $timesent;

        return $this;
    }

    /**
     * Get timesent
     *
     * @return integer 
     */
    public function getTimesent()
    {
        return $this->timesent;
    }
}
