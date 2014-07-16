<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielCourseUsers
 *
 * @ORM\Table(name="mdl_referentiel_course_users", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_refecouruser_couref_uix", columns={"courseid", "refrefid"})})
 * @ORM\Entity
 */
class MdlReferentielCourseUsers
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
     * @ORM\Column(name="tab_users", type="blob", nullable=true)
     */
    private $tabUsers;

    /**
     * @var string
     *
     * @ORM\Column(name="tab_initiales", type="blob", nullable=true)
     */
    private $tabInitiales;

    /**
     * @var string
     *
     * @ORM\Column(name="tab_pedagos", type="blob", nullable=true)
     */
    private $tabPedagos;

    /**
     * @var integer
     *
     * @ORM\Column(name="courseid", type="bigint", nullable=false)
     */
    private $courseid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="refrefid", type="bigint", nullable=false)
     */
    private $refrefid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="timestamp", type="bigint", nullable=false)
     */
    private $timestamp = '0';



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
     * Set tabUsers
     *
     * @param string $tabUsers
     * @return MdlReferentielCourseUsers
     */
    public function setTabUsers($tabUsers)
    {
        $this->tabUsers = $tabUsers;

        return $this;
    }

    /**
     * Get tabUsers
     *
     * @return string 
     */
    public function getTabUsers()
    {
        return $this->tabUsers;
    }

    /**
     * Set tabInitiales
     *
     * @param string $tabInitiales
     * @return MdlReferentielCourseUsers
     */
    public function setTabInitiales($tabInitiales)
    {
        $this->tabInitiales = $tabInitiales;

        return $this;
    }

    /**
     * Get tabInitiales
     *
     * @return string 
     */
    public function getTabInitiales()
    {
        return $this->tabInitiales;
    }

    /**
     * Set tabPedagos
     *
     * @param string $tabPedagos
     * @return MdlReferentielCourseUsers
     */
    public function setTabPedagos($tabPedagos)
    {
        $this->tabPedagos = $tabPedagos;

        return $this;
    }

    /**
     * Get tabPedagos
     *
     * @return string 
     */
    public function getTabPedagos()
    {
        return $this->tabPedagos;
    }

    /**
     * Set courseid
     *
     * @param integer $courseid
     * @return MdlReferentielCourseUsers
     */
    public function setCourseid($courseid)
    {
        $this->courseid = $courseid;

        return $this;
    }

    /**
     * Get courseid
     *
     * @return integer 
     */
    public function getCourseid()
    {
        return $this->courseid;
    }

    /**
     * Set refrefid
     *
     * @param integer $refrefid
     * @return MdlReferentielCourseUsers
     */
    public function setRefrefid($refrefid)
    {
        $this->refrefid = $refrefid;

        return $this;
    }

    /**
     * Get refrefid
     *
     * @return integer 
     */
    public function getRefrefid()
    {
        return $this->refrefid;
    }

    /**
     * Set timestamp
     *
     * @param integer $timestamp
     * @return MdlReferentielCourseUsers
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return integer 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
