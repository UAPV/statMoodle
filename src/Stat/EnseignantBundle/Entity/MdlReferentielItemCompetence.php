<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielItemCompetence
 *
 * @ORM\Table(name="mdl_referentiel_item_competence", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_refeitemcomp_codref_uix", columns={"code_item", "ref_competence"})})
 * @ORM\Entity
 */
class MdlReferentielItemCompetence
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
     * @ORM\Column(name="code_item", type="string", length=20, nullable=false)
     */
    private $codeItem = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_item", type="text", nullable=false)
     */
    private $descriptionItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_referentiel", type="bigint", nullable=false)
     */
    private $refReferentiel = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_competence", type="bigint", nullable=false)
     */
    private $refCompetence = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="type_item", type="string", length=20, nullable=false)
     */
    private $typeItem = '';

    /**
     * @var float
     *
     * @ORM\Column(name="poids_item", type="float", precision=10, scale=0, nullable=false)
     */
    private $poidsItem = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="empreinte_item", type="smallint", nullable=false)
     */
    private $empreinteItem = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="num_item", type="boolean", nullable=false)
     */
    private $numItem = '0';



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
     * Set codeItem
     *
     * @param string $codeItem
     * @return MdlReferentielItemCompetence
     */
    public function setCodeItem($codeItem)
    {
        $this->codeItem = $codeItem;

        return $this;
    }

    /**
     * Get codeItem
     *
     * @return string 
     */
    public function getCodeItem()
    {
        return $this->codeItem;
    }

    /**
     * Set descriptionItem
     *
     * @param string $descriptionItem
     * @return MdlReferentielItemCompetence
     */
    public function setDescriptionItem($descriptionItem)
    {
        $this->descriptionItem = $descriptionItem;

        return $this;
    }

    /**
     * Get descriptionItem
     *
     * @return string 
     */
    public function getDescriptionItem()
    {
        return $this->descriptionItem;
    }

    /**
     * Set refReferentiel
     *
     * @param integer $refReferentiel
     * @return MdlReferentielItemCompetence
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
     * Set refCompetence
     *
     * @param integer $refCompetence
     * @return MdlReferentielItemCompetence
     */
    public function setRefCompetence($refCompetence)
    {
        $this->refCompetence = $refCompetence;

        return $this;
    }

    /**
     * Get refCompetence
     *
     * @return integer 
     */
    public function getRefCompetence()
    {
        return $this->refCompetence;
    }

    /**
     * Set typeItem
     *
     * @param string $typeItem
     * @return MdlReferentielItemCompetence
     */
    public function setTypeItem($typeItem)
    {
        $this->typeItem = $typeItem;

        return $this;
    }

    /**
     * Get typeItem
     *
     * @return string 
     */
    public function getTypeItem()
    {
        return $this->typeItem;
    }

    /**
     * Set poidsItem
     *
     * @param float $poidsItem
     * @return MdlReferentielItemCompetence
     */
    public function setPoidsItem($poidsItem)
    {
        $this->poidsItem = $poidsItem;

        return $this;
    }

    /**
     * Get poidsItem
     *
     * @return float 
     */
    public function getPoidsItem()
    {
        return $this->poidsItem;
    }

    /**
     * Set empreinteItem
     *
     * @param integer $empreinteItem
     * @return MdlReferentielItemCompetence
     */
    public function setEmpreinteItem($empreinteItem)
    {
        $this->empreinteItem = $empreinteItem;

        return $this;
    }

    /**
     * Get empreinteItem
     *
     * @return integer 
     */
    public function getEmpreinteItem()
    {
        return $this->empreinteItem;
    }

    /**
     * Set numItem
     *
     * @param boolean $numItem
     * @return MdlReferentielItemCompetence
     */
    public function setNumItem($numItem)
    {
        $this->numItem = $numItem;

        return $this;
    }

    /**
     * Get numItem
     *
     * @return boolean 
     */
    public function getNumItem()
    {
        return $this->numItem;
    }
}
