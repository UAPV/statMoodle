<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielCompetence
 *
 * @ORM\Table(name="mdl_referentiel_competence", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_refecomp_codref_uix", columns={"code_competence", "ref_domaine"})})
 * @ORM\Entity
 */
class MdlReferentielCompetence
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
     * @ORM\Column(name="code_competence", type="string", length=20, nullable=false)
     */
    private $codeCompetence = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_competence", type="text", nullable=false)
     */
    private $descriptionCompetence;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_domaine", type="bigint", nullable=false)
     */
    private $refDomaine = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="num_competence", type="boolean", nullable=false)
     */
    private $numCompetence = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="nb_item_competences", type="boolean", nullable=false)
     */
    private $nbItemCompetences = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="type_competence", type="string", length=10, nullable=false)
     */
    private $typeCompetence = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="seuil_competence", type="string", length=10, nullable=false)
     */
    private $seuilCompetence = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="minima_competence", type="string", length=10, nullable=false)
     */
    private $minimaCompetence = '0';



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
     * Set codeCompetence
     *
     * @param string $codeCompetence
     * @return MdlReferentielCompetence
     */
    public function setCodeCompetence($codeCompetence)
    {
        $this->codeCompetence = $codeCompetence;

        return $this;
    }

    /**
     * Get codeCompetence
     *
     * @return string 
     */
    public function getCodeCompetence()
    {
        return $this->codeCompetence;
    }

    /**
     * Set descriptionCompetence
     *
     * @param string $descriptionCompetence
     * @return MdlReferentielCompetence
     */
    public function setDescriptionCompetence($descriptionCompetence)
    {
        $this->descriptionCompetence = $descriptionCompetence;

        return $this;
    }

    /**
     * Get descriptionCompetence
     *
     * @return string 
     */
    public function getDescriptionCompetence()
    {
        return $this->descriptionCompetence;
    }

    /**
     * Set refDomaine
     *
     * @param integer $refDomaine
     * @return MdlReferentielCompetence
     */
    public function setRefDomaine($refDomaine)
    {
        $this->refDomaine = $refDomaine;

        return $this;
    }

    /**
     * Get refDomaine
     *
     * @return integer 
     */
    public function getRefDomaine()
    {
        return $this->refDomaine;
    }

    /**
     * Set numCompetence
     *
     * @param boolean $numCompetence
     * @return MdlReferentielCompetence
     */
    public function setNumCompetence($numCompetence)
    {
        $this->numCompetence = $numCompetence;

        return $this;
    }

    /**
     * Get numCompetence
     *
     * @return boolean 
     */
    public function getNumCompetence()
    {
        return $this->numCompetence;
    }

    /**
     * Set nbItemCompetences
     *
     * @param boolean $nbItemCompetences
     * @return MdlReferentielCompetence
     */
    public function setNbItemCompetences($nbItemCompetences)
    {
        $this->nbItemCompetences = $nbItemCompetences;

        return $this;
    }

    /**
     * Get nbItemCompetences
     *
     * @return boolean 
     */
    public function getNbItemCompetences()
    {
        return $this->nbItemCompetences;
    }

    /**
     * Set typeCompetence
     *
     * @param string $typeCompetence
     * @return MdlReferentielCompetence
     */
    public function setTypeCompetence($typeCompetence)
    {
        $this->typeCompetence = $typeCompetence;

        return $this;
    }

    /**
     * Get typeCompetence
     *
     * @return string 
     */
    public function getTypeCompetence()
    {
        return $this->typeCompetence;
    }

    /**
     * Set seuilCompetence
     *
     * @param string $seuilCompetence
     * @return MdlReferentielCompetence
     */
    public function setSeuilCompetence($seuilCompetence)
    {
        $this->seuilCompetence = $seuilCompetence;

        return $this;
    }

    /**
     * Get seuilCompetence
     *
     * @return string 
     */
    public function getSeuilCompetence()
    {
        return $this->seuilCompetence;
    }

    /**
     * Set minimaCompetence
     *
     * @param string $minimaCompetence
     * @return MdlReferentielCompetence
     */
    public function setMinimaCompetence($minimaCompetence)
    {
        $this->minimaCompetence = $minimaCompetence;

        return $this;
    }

    /**
     * Get minimaCompetence
     *
     * @return string 
     */
    public function getMinimaCompetence()
    {
        return $this->minimaCompetence;
    }
}
