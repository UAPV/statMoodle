<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielAccompagnement
 *
 * @ORM\Table(name="mdl_referentiel_accompagnement")
 * @ORM\Entity
 */
class MdlReferentielAccompagnement
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
     * @ORM\Column(name="accompagnement", type="string", length=3, nullable=false)
     */
    private $accompagnement = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_instance", type="bigint", nullable=false)
     */
    private $refInstance = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="courseid", type="bigint", nullable=false)
     */
    private $courseid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="bigint", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="teacherid", type="bigint", nullable=false)
     */
    private $teacherid;



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
     * Set accompagnement
     *
     * @param string $accompagnement
     * @return MdlReferentielAccompagnement
     */
    public function setAccompagnement($accompagnement)
    {
        $this->accompagnement = $accompagnement;

        return $this;
    }

    /**
     * Get accompagnement
     *
     * @return string 
     */
    public function getAccompagnement()
    {
        return $this->accompagnement;
    }

    /**
     * Set refInstance
     *
     * @param integer $refInstance
     * @return MdlReferentielAccompagnement
     */
    public function setRefInstance($refInstance)
    {
        $this->refInstance = $refInstance;

        return $this;
    }

    /**
     * Get refInstance
     *
     * @return integer 
     */
    public function getRefInstance()
    {
        return $this->refInstance;
    }

    /**
     * Set courseid
     *
     * @param integer $courseid
     * @return MdlReferentielAccompagnement
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
     * Set userid
     *
     * @param integer $userid
     * @return MdlReferentielAccompagnement
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set teacherid
     *
     * @param integer $teacherid
     * @return MdlReferentielAccompagnement
     */
    public function setTeacherid($teacherid)
    {
        $this->teacherid = $teacherid;

        return $this;
    }

    /**
     * Get teacherid
     *
     * @return integer 
     */
    public function getTeacherid()
    {
        return $this->teacherid;
    }
}
