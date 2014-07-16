<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielActivite
 *
 * @ORM\Table(name="mdl_referentiel_activite", indexes={@ORM\Index(name="mdl_refeacti_use_ix", columns={"userid"}), @ORM\Index(name="mdl_refeacti_ref_ix", columns={"ref_instance"}), @ORM\Index(name="mdl_refeacti_ref2_ix", columns={"ref_referentiel"})})
 * @ORM\Entity
 */
class MdlReferentielActivite
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
     * @ORM\Column(name="type_activite", type="string", length=255, nullable=false)
     */
    private $typeActivite = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_activite", type="text", nullable=false)
     */
    private $descriptionActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="competences_activite", type="text", nullable=false)
     */
    private $competencesActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_activite", type="text", nullable=false)
     */
    private $commentaireActivite;

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
     * @ORM\Column(name="teacherid", type="bigint", nullable=false)
     */
    private $teacherid;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_creation", type="bigint", nullable=false)
     */
    private $dateCreation = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_modif_student", type="bigint", nullable=false)
     */
    private $dateModifStudent = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_modif", type="bigint", nullable=false)
     */
    private $dateModif = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="approved", type="smallint", nullable=false)
     */
    private $approved = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_task", type="bigint", nullable=false)
     */
    private $refTask = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="mailed", type="boolean", nullable=false)
     */
    private $mailed = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="mailnow", type="bigint", nullable=false)
     */
    private $mailnow = '0';



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
     * Set typeActivite
     *
     * @param string $typeActivite
     * @return MdlReferentielActivite
     */
    public function setTypeActivite($typeActivite)
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }

    /**
     * Get typeActivite
     *
     * @return string 
     */
    public function getTypeActivite()
    {
        return $this->typeActivite;
    }

    /**
     * Set descriptionActivite
     *
     * @param string $descriptionActivite
     * @return MdlReferentielActivite
     */
    public function setDescriptionActivite($descriptionActivite)
    {
        $this->descriptionActivite = $descriptionActivite;

        return $this;
    }

    /**
     * Get descriptionActivite
     *
     * @return string 
     */
    public function getDescriptionActivite()
    {
        return $this->descriptionActivite;
    }

    /**
     * Set competencesActivite
     *
     * @param string $competencesActivite
     * @return MdlReferentielActivite
     */
    public function setCompetencesActivite($competencesActivite)
    {
        $this->competencesActivite = $competencesActivite;

        return $this;
    }

    /**
     * Get competencesActivite
     *
     * @return string 
     */
    public function getCompetencesActivite()
    {
        return $this->competencesActivite;
    }

    /**
     * Set commentaireActivite
     *
     * @param string $commentaireActivite
     * @return MdlReferentielActivite
     */
    public function setCommentaireActivite($commentaireActivite)
    {
        $this->commentaireActivite = $commentaireActivite;

        return $this;
    }

    /**
     * Get commentaireActivite
     *
     * @return string 
     */
    public function getCommentaireActivite()
    {
        return $this->commentaireActivite;
    }

    /**
     * Set refInstance
     *
     * @param integer $refInstance
     * @return MdlReferentielActivite
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
     * @return MdlReferentielActivite
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
     * @return MdlReferentielActivite
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
     * @return MdlReferentielActivite
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
     * @return MdlReferentielActivite
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

    /**
     * Set dateCreation
     *
     * @param integer $dateCreation
     * @return MdlReferentielActivite
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return integer 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModifStudent
     *
     * @param integer $dateModifStudent
     * @return MdlReferentielActivite
     */
    public function setDateModifStudent($dateModifStudent)
    {
        $this->dateModifStudent = $dateModifStudent;

        return $this;
    }

    /**
     * Get dateModifStudent
     *
     * @return integer 
     */
    public function getDateModifStudent()
    {
        return $this->dateModifStudent;
    }

    /**
     * Set dateModif
     *
     * @param integer $dateModif
     * @return MdlReferentielActivite
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return integer 
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * Set approved
     *
     * @param integer $approved
     * @return MdlReferentielActivite
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return integer 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set refTask
     *
     * @param integer $refTask
     * @return MdlReferentielActivite
     */
    public function setRefTask($refTask)
    {
        $this->refTask = $refTask;

        return $this;
    }

    /**
     * Get refTask
     *
     * @return integer 
     */
    public function getRefTask()
    {
        return $this->refTask;
    }

    /**
     * Set mailed
     *
     * @param boolean $mailed
     * @return MdlReferentielActivite
     */
    public function setMailed($mailed)
    {
        $this->mailed = $mailed;

        return $this;
    }

    /**
     * Get mailed
     *
     * @return boolean 
     */
    public function getMailed()
    {
        return $this->mailed;
    }

    /**
     * Set mailnow
     *
     * @param integer $mailnow
     * @return MdlReferentielActivite
     */
    public function setMailnow($mailnow)
    {
        $this->mailnow = $mailnow;

        return $this;
    }

    /**
     * Get mailnow
     *
     * @return integer 
     */
    public function getMailnow()
    {
        return $this->mailnow;
    }
}
