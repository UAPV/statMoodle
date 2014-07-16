<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielCertificat
 *
 * @ORM\Table(name="mdl_referentiel_certificat", indexes={@ORM\Index(name="mdl_refecert_use_ix", columns={"userid"}), @ORM\Index(name="mdl_refecert_ref_ix", columns={"ref_referentiel"})})
 * @ORM\Entity
 */
class MdlReferentielCertificat
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
     * @ORM\Column(name="commentaire_certificat", type="text", nullable=false)
     */
    private $commentaireCertificat;

    /**
     * @var string
     *
     * @ORM\Column(name="competences_certificat", type="text", nullable=false)
     */
    private $competencesCertificat;

    /**
     * @var string
     *
     * @ORM\Column(name="competences_activite", type="text", nullable=false)
     */
    private $competencesActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="decision_jury", type="string", length=80, nullable=false)
     */
    private $decisionJury = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_decision", type="bigint", nullable=false)
     */
    private $dateDecision = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_referentiel", type="bigint", nullable=false)
     */
    private $refReferentiel = '0';

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
     * @var boolean
     *
     * @ORM\Column(name="verrou", type="boolean", nullable=false)
     */
    private $verrou;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valide", type="boolean", nullable=false)
     */
    private $valide;

    /**
     * @var integer
     *
     * @ORM\Column(name="evaluation", type="bigint", nullable=false)
     */
    private $evaluation;

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
     * @var string
     *
     * @ORM\Column(name="synthese_certificat", type="text", nullable=false)
     */
    private $syntheseCertificat;



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
     * Set commentaireCertificat
     *
     * @param string $commentaireCertificat
     * @return MdlReferentielCertificat
     */
    public function setCommentaireCertificat($commentaireCertificat)
    {
        $this->commentaireCertificat = $commentaireCertificat;

        return $this;
    }

    /**
     * Get commentaireCertificat
     *
     * @return string 
     */
    public function getCommentaireCertificat()
    {
        return $this->commentaireCertificat;
    }

    /**
     * Set competencesCertificat
     *
     * @param string $competencesCertificat
     * @return MdlReferentielCertificat
     */
    public function setCompetencesCertificat($competencesCertificat)
    {
        $this->competencesCertificat = $competencesCertificat;

        return $this;
    }

    /**
     * Get competencesCertificat
     *
     * @return string 
     */
    public function getCompetencesCertificat()
    {
        return $this->competencesCertificat;
    }

    /**
     * Set competencesActivite
     *
     * @param string $competencesActivite
     * @return MdlReferentielCertificat
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
     * Set decisionJury
     *
     * @param string $decisionJury
     * @return MdlReferentielCertificat
     */
    public function setDecisionJury($decisionJury)
    {
        $this->decisionJury = $decisionJury;

        return $this;
    }

    /**
     * Get decisionJury
     *
     * @return string 
     */
    public function getDecisionJury()
    {
        return $this->decisionJury;
    }

    /**
     * Set dateDecision
     *
     * @param integer $dateDecision
     * @return MdlReferentielCertificat
     */
    public function setDateDecision($dateDecision)
    {
        $this->dateDecision = $dateDecision;

        return $this;
    }

    /**
     * Get dateDecision
     *
     * @return integer 
     */
    public function getDateDecision()
    {
        return $this->dateDecision;
    }

    /**
     * Set refReferentiel
     *
     * @param integer $refReferentiel
     * @return MdlReferentielCertificat
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
     * Set userid
     *
     * @param integer $userid
     * @return MdlReferentielCertificat
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
     * @return MdlReferentielCertificat
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
     * Set verrou
     *
     * @param boolean $verrou
     * @return MdlReferentielCertificat
     */
    public function setVerrou($verrou)
    {
        $this->verrou = $verrou;

        return $this;
    }

    /**
     * Get verrou
     *
     * @return boolean 
     */
    public function getVerrou()
    {
        return $this->verrou;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     * @return MdlReferentielCertificat
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean 
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set evaluation
     *
     * @param integer $evaluation
     * @return MdlReferentielCertificat
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return integer 
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set mailed
     *
     * @param boolean $mailed
     * @return MdlReferentielCertificat
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
     * @return MdlReferentielCertificat
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
     * Set syntheseCertificat
     *
     * @param string $syntheseCertificat
     * @return MdlReferentielCertificat
     */
    public function setSyntheseCertificat($syntheseCertificat)
    {
        $this->syntheseCertificat = $syntheseCertificat;

        return $this;
    }

    /**
     * Get syntheseCertificat
     *
     * @return string 
     */
    public function getSyntheseCertificat()
    {
        return $this->syntheseCertificat;
    }
}
