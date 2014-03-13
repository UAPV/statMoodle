<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielNotification
 *
 * @ORM\Table(name="mdl_referentiel_notification", indexes={@ORM\Index(name="mdl_refenoti_use_ix", columns={"userid"}), @ORM\Index(name="mdl_refenoti_act_ix", columns={"activiteid"})})
 * @ORM\Entity
 */
class MdlReferentielNotification
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
     * @ORM\Column(name="userid", type="bigint", nullable=false)
     */
    private $userid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="activiteid", type="bigint", nullable=false)
     */
    private $activiteid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="timemodified", type="bigint", nullable=false)
     */
    private $timemodified = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type = '0';



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
     * Set userid
     *
     * @param integer $userid
     * @return MdlReferentielNotification
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
     * @return MdlReferentielNotification
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
     * Set timemodified
     *
     * @param integer $timemodified
     * @return MdlReferentielNotification
     */
    public function setTimemodified($timemodified)
    {
        $this->timemodified = $timemodified;

        return $this;
    }

    /**
     * Get timemodified
     *
     * @return integer 
     */
    public function getTimemodified()
    {
        return $this->timemodified;
    }

    /**
     * Set type
     *
     * @param boolean $type
     * @return MdlReferentielNotification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean 
     */
    public function getType()
    {
        return $this->type;
    }
}
