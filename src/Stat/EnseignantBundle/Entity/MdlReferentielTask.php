<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielTask
 *
 * @ORM\Table(name="mdl_referentiel_task", indexes={@ORM\Index(name="mdl_refetask_ref_ix", columns={"ref_instance"})})
 * @ORM\Entity
 */
class MdlReferentielTask
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
     * @ORM\Column(name="type_task", type="string", length=255, nullable=false)
     */
    private $typeTask = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_task", type="text", nullable=false)
     */
    private $descriptionTask;

    /**
     * @var string
     *
     * @ORM\Column(name="competences_task", type="text", nullable=false)
     */
    private $competencesTask;

    /**
     * @var string
     *
     * @ORM\Column(name="criteres_evaluation", type="text", nullable=false)
     */
    private $criteresEvaluation;

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
     * @ORM\Column(name="auteurid", type="bigint", nullable=false)
     */
    private $auteurid;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_creation", type="bigint", nullable=false)
     */
    private $dateCreation = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_modif", type="bigint", nullable=false)
     */
    private $dateModif = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_debut", type="bigint", nullable=false)
     */
    private $dateDebut = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_fin", type="bigint", nullable=false)
     */
    private $dateFin = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cle_souscription", type="string", length=255, nullable=false)
     */
    private $cleSouscription = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="souscription_libre", type="smallint", nullable=false)
     */
    private $souscriptionLibre = '1';

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
     * @var integer
     *
     * @ORM\Column(name="tache_masquee", type="smallint", nullable=false)
     */
    private $tacheMasquee = '0';



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
     * Set typeTask
     *
     * @param string $typeTask
     * @return MdlReferentielTask
     */
    public function setTypeTask($typeTask)
    {
        $this->typeTask = $typeTask;

        return $this;
    }

    /**
     * Get typeTask
     *
     * @return string 
     */
    public function getTypeTask()
    {
        return $this->typeTask;
    }

    /**
     * Set descriptionTask
     *
     * @param string $descriptionTask
     * @return MdlReferentielTask
     */
    public function setDescriptionTask($descriptionTask)
    {
        $this->descriptionTask = $descriptionTask;

        return $this;
    }

    /**
     * Get descriptionTask
     *
     * @return string 
     */
    public function getDescriptionTask()
    {
        return $this->descriptionTask;
    }

    /**
     * Set competencesTask
     *
     * @param string $competencesTask
     * @return MdlReferentielTask
     */
    public function setCompetencesTask($competencesTask)
    {
        $this->competencesTask = $competencesTask;

        return $this;
    }

    /**
     * Get competencesTask
     *
     * @return string 
     */
    public function getCompetencesTask()
    {
        return $this->competencesTask;
    }

    /**
     * Set criteresEvaluation
     *
     * @param string $criteresEvaluation
     * @return MdlReferentielTask
     */
    public function setCriteresEvaluation($criteresEvaluation)
    {
        $this->criteresEvaluation = $criteresEvaluation;

        return $this;
    }

    /**
     * Get criteresEvaluation
     *
     * @return string 
     */
    public function getCriteresEvaluation()
    {
        return $this->criteresEvaluation;
    }

    /**
     * Set refInstance
     *
     * @param integer $refInstance
     * @return MdlReferentielTask
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
     * @return MdlReferentielTask
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
     * @return MdlReferentielTask
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
     * Set auteurid
     *
     * @param integer $auteurid
     * @return MdlReferentielTask
     */
    public function setAuteurid($auteurid)
    {
        $this->auteurid = $auteurid;

        return $this;
    }

    /**
     * Get auteurid
     *
     * @return integer 
     */
    public function getAuteurid()
    {
        return $this->auteurid;
    }

    /**
     * Set dateCreation
     *
     * @param integer $dateCreation
     * @return MdlReferentielTask
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
     * Set dateModif
     *
     * @param integer $dateModif
     * @return MdlReferentielTask
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
     * Set dateDebut
     *
     * @param integer $dateDebut
     * @return MdlReferentielTask
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return integer 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param integer $dateFin
     * @return MdlReferentielTask
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return integer 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set cleSouscription
     *
     * @param string $cleSouscription
     * @return MdlReferentielTask
     */
    public function setCleSouscription($cleSouscription)
    {
        $this->cleSouscription = $cleSouscription;

        return $this;
    }

    /**
     * Get cleSouscription
     *
     * @return string 
     */
    public function getCleSouscription()
    {
        return $this->cleSouscription;
    }

    /**
     * Set souscriptionLibre
     *
     * @param integer $souscriptionLibre
     * @return MdlReferentielTask
     */
    public function setSouscriptionLibre($souscriptionLibre)
    {
        $this->souscriptionLibre = $souscriptionLibre;

        return $this;
    }

    /**
     * Get souscriptionLibre
     *
     * @return integer 
     */
    public function getSouscriptionLibre()
    {
        return $this->souscriptionLibre;
    }

    /**
     * Set mailed
     *
     * @param boolean $mailed
     * @return MdlReferentielTask
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
     * @return MdlReferentielTask
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

    /**
     * Set tacheMasquee
     *
     * @param integer $tacheMasquee
     * @return MdlReferentielTask
     */
    public function setTacheMasquee($tacheMasquee)
    {
        $this->tacheMasquee = $tacheMasquee;

        return $this;
    }

    /**
     * Get tacheMasquee
     *
     * @return integer 
     */
    public function getTacheMasquee()
    {
        return $this->tacheMasquee;
    }
}
