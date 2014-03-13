<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielDomaine
 *
 * @ORM\Table(name="mdl_referentiel_domaine", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_refedoma_codref_uix", columns={"code_domaine", "ref_referentiel"})})
 * @ORM\Entity
 */
class MdlReferentielDomaine
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
     * @ORM\Column(name="code_domaine", type="string", length=20, nullable=false)
     */
    private $codeDomaine = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_domaine", type="text", nullable=false)
     */
    private $descriptionDomaine;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_referentiel", type="bigint", nullable=false)
     */
    private $refReferentiel = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="num_domaine", type="boolean", nullable=false)
     */
    private $numDomaine = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="nb_competences", type="boolean", nullable=false)
     */
    private $nbCompetences = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="type_domaine", type="string", length=10, nullable=false)
     */
    private $typeDomaine = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="seuil_domaine", type="string", length=10, nullable=false)
     */
    private $seuilDomaine = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="minima_domaine", type="string", length=10, nullable=false)
     */
    private $minimaDomaine = '0';



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
     * Set codeDomaine
     *
     * @param string $codeDomaine
     * @return MdlReferentielDomaine
     */
    public function setCodeDomaine($codeDomaine)
    {
        $this->codeDomaine = $codeDomaine;

        return $this;
    }

    /**
     * Get codeDomaine
     *
     * @return string 
     */
    public function getCodeDomaine()
    {
        return $this->codeDomaine;
    }

    /**
     * Set descriptionDomaine
     *
     * @param string $descriptionDomaine
     * @return MdlReferentielDomaine
     */
    public function setDescriptionDomaine($descriptionDomaine)
    {
        $this->descriptionDomaine = $descriptionDomaine;

        return $this;
    }

    /**
     * Get descriptionDomaine
     *
     * @return string 
     */
    public function getDescriptionDomaine()
    {
        return $this->descriptionDomaine;
    }

    /**
     * Set refReferentiel
     *
     * @param integer $refReferentiel
     * @return MdlReferentielDomaine
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
     * Set numDomaine
     *
     * @param boolean $numDomaine
     * @return MdlReferentielDomaine
     */
    public function setNumDomaine($numDomaine)
    {
        $this->numDomaine = $numDomaine;

        return $this;
    }

    /**
     * Get numDomaine
     *
     * @return boolean 
     */
    public function getNumDomaine()
    {
        return $this->numDomaine;
    }

    /**
     * Set nbCompetences
     *
     * @param boolean $nbCompetences
     * @return MdlReferentielDomaine
     */
    public function setNbCompetences($nbCompetences)
    {
        $this->nbCompetences = $nbCompetences;

        return $this;
    }

    /**
     * Get nbCompetences
     *
     * @return boolean 
     */
    public function getNbCompetences()
    {
        return $this->nbCompetences;
    }

    /**
     * Set typeDomaine
     *
     * @param string $typeDomaine
     * @return MdlReferentielDomaine
     */
    public function setTypeDomaine($typeDomaine)
    {
        $this->typeDomaine = $typeDomaine;

        return $this;
    }

    /**
     * Get typeDomaine
     *
     * @return string 
     */
    public function getTypeDomaine()
    {
        return $this->typeDomaine;
    }

    /**
     * Set seuilDomaine
     *
     * @param string $seuilDomaine
     * @return MdlReferentielDomaine
     */
    public function setSeuilDomaine($seuilDomaine)
    {
        $this->seuilDomaine = $seuilDomaine;

        return $this;
    }

    /**
     * Get seuilDomaine
     *
     * @return string 
     */
    public function getSeuilDomaine()
    {
        return $this->seuilDomaine;
    }

    /**
     * Set minimaDomaine
     *
     * @param string $minimaDomaine
     * @return MdlReferentielDomaine
     */
    public function setMinimaDomaine($minimaDomaine)
    {
        $this->minimaDomaine = $minimaDomaine;

        return $this;
    }

    /**
     * Get minimaDomaine
     *
     * @return string 
     */
    public function getMinimaDomaine()
    {
        return $this->minimaDomaine;
    }
}
