<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlCourseAllowedModules
 *
 * @ORM\Table(name="mdl_course_allowed_modules", indexes={@ORM\Index(name="mdl_courallomodu_cou_ix", columns={"course"}), @ORM\Index(name="mdl_courallomodu_mod_ix", columns={"module"})})
 * @ORM\Entity
 */
class MdlCourseAllowedModules
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
     * @ORM\Column(name="module", type="bigint", nullable=false)
     */
    private $module = '0';



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
     * @return MdlCourseAllowedModules
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
     * Set module
     *
     * @param integer $module
     * @return MdlCourseAllowedModules
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return integer 
     */
    public function getModule()
    {
        return $this->module;
    }
}
