<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielProtocol
 *
 * @ORM\Table(name="mdl_referentiel_protocol")
 * @ORM\Entity
 */
class MdlReferentielProtocol
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
     * @ORM\Column(name="ref_occurrence", type="bigint", nullable=false)
     */
    private $refOccurrence = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="seuil_referentiel", type="float", precision=10, scale=0, nullable=false)
     */
    private $seuilReferentiel = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="minima_referentiel", type="bigint", nullable=false)
     */
    private $minimaReferentiel = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="l_domaines_oblig", type="text", nullable=false)
     */
    private $lDomainesOblig;

    /**
     * @var string
     *
     * @ORM\Column(name="l_seuils_domaines", type="text", nullable=false)
     */
    private $lSeuilsDomaines;

    /**
     * @var string
     *
     * @ORM\Column(name="l_minimas_domaines", type="text", nullable=false)
     */
    private $lMinimasDomaines;

    /**
     * @var string
     *
     * @ORM\Column(name="l_competences_oblig", type="text", nullable=false)
     */
    private $lCompetencesOblig;

    /**
     * @var string
     *
     * @ORM\Column(name="l_seuils_competences", type="text", nullable=false)
     */
    private $lSeuilsCompetences;

    /**
     * @var string
     *
     * @ORM\Column(name="l_minimas_competences", type="text", nullable=false)
     */
    private $lMinimasCompetences;

    /**
     * @var string
     *
     * @ORM\Column(name="l_items_oblig", type="text", nullable=false)
     */
    private $lItemsOblig;

    /**
     * @var integer
     *
     * @ORM\Column(name="timemodified", type="bigint", nullable=false)
     */
    private $timemodified = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=false)
     */
    private $commentaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif", type="boolean", nullable=false)
     */
    private $actif = '0';



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
     * Set refOccurrence
     *
     * @param integer $refOccurrence
     * @return MdlReferentielProtocol
     */
    public function setRefOccurrence($refOccurrence)
    {
        $this->refOccurrence = $refOccurrence;

        return $this;
    }

    /**
     * Get refOccurrence
     *
     * @return integer 
     */
    public function getRefOccurrence()
    {
        return $this->refOccurrence;
    }

    /**
     * Set seuilReferentiel
     *
     * @param float $seuilReferentiel
     * @return MdlReferentielProtocol
     */
    public function setSeuilReferentiel($seuilReferentiel)
    {
        $this->seuilReferentiel = $seuilReferentiel;

        return $this;
    }

    /**
     * Get seuilReferentiel
     *
     * @return float 
     */
    public function getSeuilReferentiel()
    {
        return $this->seuilReferentiel;
    }

    /**
     * Set minimaReferentiel
     *
     * @param integer $minimaReferentiel
     * @return MdlReferentielProtocol
     */
    public function setMinimaReferentiel($minimaReferentiel)
    {
        $this->minimaReferentiel = $minimaReferentiel;

        return $this;
    }

    /**
     * Get minimaReferentiel
     *
     * @return integer 
     */
    public function getMinimaReferentiel()
    {
        return $this->minimaReferentiel;
    }

    /**
     * Set lDomainesOblig
     *
     * @param string $lDomainesOblig
     * @return MdlReferentielProtocol
     */
    public function setLDomainesOblig($lDomainesOblig)
    {
        $this->lDomainesOblig = $lDomainesOblig;

        return $this;
    }

    /**
     * Get lDomainesOblig
     *
     * @return string 
     */
    public function getLDomainesOblig()
    {
        return $this->lDomainesOblig;
    }

    /**
     * Set lSeuilsDomaines
     *
     * @param string $lSeuilsDomaines
     * @return MdlReferentielProtocol
     */
    public function setLSeuilsDomaines($lSeuilsDomaines)
    {
        $this->lSeuilsDomaines = $lSeuilsDomaines;

        return $this;
    }

    /**
     * Get lSeuilsDomaines
     *
     * @return string 
     */
    public function getLSeuilsDomaines()
    {
        return $this->lSeuilsDomaines;
    }

    /**
     * Set lMinimasDomaines
     *
     * @param string $lMinimasDomaines
     * @return MdlReferentielProtocol
     */
    public function setLMinimasDomaines($lMinimasDomaines)
    {
        $this->lMinimasDomaines = $lMinimasDomaines;

        return $this;
    }

    /**
     * Get lMinimasDomaines
     *
     * @return string 
     */
    public function getLMinimasDomaines()
    {
        return $this->lMinimasDomaines;
    }

    /**
     * Set lCompetencesOblig
     *
     * @param string $lCompetencesOblig
     * @return MdlReferentielProtocol
     */
    public function setLCompetencesOblig($lCompetencesOblig)
    {
        $this->lCompetencesOblig = $lCompetencesOblig;

        return $this;
    }

    /**
     * Get lCompetencesOblig
     *
     * @return string 
     */
    public function getLCompetencesOblig()
    {
        return $this->lCompetencesOblig;
    }

    /**
     * Set lSeuilsCompetences
     *
     * @param string $lSeuilsCompetences
     * @return MdlReferentielProtocol
     */
    public function setLSeuilsCompetences($lSeuilsCompetences)
    {
        $this->lSeuilsCompetences = $lSeuilsCompetences;

        return $this;
    }

    /**
     * Get lSeuilsCompetences
     *
     * @return string 
     */
    public function getLSeuilsCompetences()
    {
        return $this->lSeuilsCompetences;
    }

    /**
     * Set lMinimasCompetences
     *
     * @param string $lMinimasCompetences
     * @return MdlReferentielProtocol
     */
    public function setLMinimasCompetences($lMinimasCompetences)
    {
        $this->lMinimasCompetences = $lMinimasCompetences;

        return $this;
    }

    /**
     * Get lMinimasCompetences
     *
     * @return string 
     */
    public function getLMinimasCompetences()
    {
        return $this->lMinimasCompetences;
    }

    /**
     * Set lItemsOblig
     *
     * @param string $lItemsOblig
     * @return MdlReferentielProtocol
     */
    public function setLItemsOblig($lItemsOblig)
    {
        $this->lItemsOblig = $lItemsOblig;

        return $this;
    }

    /**
     * Get lItemsOblig
     *
     * @return string 
     */
    public function getLItemsOblig()
    {
        return $this->lItemsOblig;
    }

    /**
     * Set timemodified
     *
     * @param integer $timemodified
     * @return MdlReferentielProtocol
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
     * Set commentaire
     *
     * @param string $commentaire
     * @return MdlReferentielProtocol
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return MdlReferentielProtocol
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }
}
