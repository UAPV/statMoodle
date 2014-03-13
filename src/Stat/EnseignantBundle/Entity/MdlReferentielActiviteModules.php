<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielActiviteModules
 *
 * @ORM\Table(name="mdl_referentiel_activite_modules")
 * @ORM\Entity
 */
class MdlReferentielActiviteModules
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
     * @ORM\Column(name="type", type="string", length=80, nullable=false)
     */
    private $type = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="moduleid", type="bigint", nullable=false)
     */
    private $moduleid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_instance", type="bigint", nullable=false)
     */
    private $refInstance = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_referentiel", type="bigint", nullable=false)
     */
    private $refReferentiel = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_course", type="bigint", nullable=false)
     */
    private $refCourse = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="bigint", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="activiteid", type="bigint", nullable=false)
     */
    private $activiteid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_activite", type="bigint", nullable=false)
     */
    private $refActivite = '0';



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
     * Set type
     *
     * @param string $type
     * @return MdlReferentielActiviteModules
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set moduleid
     *
     * @param integer $moduleid
     * @return MdlReferentielActiviteModules
     */
    public function setModuleid($moduleid)
    {
        $this->moduleid = $moduleid;

        return $this;
    }

    /**
     * Get moduleid
     *
     * @return integer 
     */
    public function getModuleid()
    {
        return $this->moduleid;
    }

    /**
     * Set refInstance
     *
     * @param integer $refInstance
     * @return MdlReferentielActiviteModules
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
     * Set refReferentiel
     *
     * @param integer $refReferentiel
     * @return MdlReferentielActiviteModules
     */
    public function setRefReferentiel($refReferentiel)
    {
        $this->refReferentiel = $refReferentiel;

        return $this;
    }

    /**
     * Get refReferentiel
     *
     * @return integer 
     */
    public function getRefReferentiel()
    {
        return $this->refReferentiel;
    }

    /**
     * Set refCourse
     *
     * @param integer $refCourse
     * @return MdlReferentielActiviteModules
     */
    public function setRefCourse($refCourse)
    {
        $this->refCourse = $refCourse;

        return $this;
    }

    /**
     * Get refCourse
     *
     * @return integer 
     */
    public function getRefCourse()
    {
        return $this->refCourse;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return MdlReferentielActiviteModules
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
     * Set activiteid
     *
     * @param integer $activiteid
     * @return MdlReferentielActiviteModules
     */
    public function setActiviteid($activiteid)
    {
        $this->activiteid = $activiteid;

        return $this;
    }

    /**
     * Get activiteid
     *
     * @return integer 
     */
    public function getActiviteid()
    {
        return $this->activiteid;
    }

    /**
     * Set refActivite
     *
     * @param integer $refActivite
     * @return MdlReferentielActiviteModules
     */
    public function setRefActivite($refActivite)
    {
        $this->refActivite = $refActivite;

        return $this;
    }

    /**
     * Get refActivite
     *
     * @return integer 
     */
    public function getRefActivite()
    {
        return $this->refActivite;
    }
}
