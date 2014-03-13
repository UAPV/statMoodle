<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielPedagogie
 *
 * @ORM\Table(name="mdl_referentiel_pedagogie")
 * @ORM\Entity
 */
class MdlReferentielPedagogie
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
     * @ORM\Column(name="promotion", type="string", length=4, nullable=true)
     */
    private $promotion;

    /**
     * @var string
     *
     * @ORM\Column(name="num_groupe", type="string", length=20, nullable=true)
     */
    private $numGroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="date_cloture", type="string", length=120, nullable=true)
     */
    private $dateCloture;

    /**
     * @var string
     *
     * @ORM\Column(name="formation", type="string", length=40, nullable=true)
     */
    private $formation;

    /**
     * @var string
     *
     * @ORM\Column(name="pedagogie", type="string", length=40, nullable=true)
     */
    private $pedagogie;

    /**
     * @var string
     *
     * @ORM\Column(name="composante", type="string", length=40, nullable=true)
     */
    private $composante;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=true)
     */
    private $commentaire = '';



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
     * Set promotion
     *
     * @param string $promotion
     * @return MdlReferentielPedagogie
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set numGroupe
     *
     * @param string $numGroupe
     * @return MdlReferentielPedagogie
     */
    public function setNumGroupe($numGroupe)
    {
        $this->numGroupe = $numGroupe;

        return $this;
    }

    /**
     * Get numGroupe
     *
     * @return string 
     */
    public function getNumGroupe()
    {
        return $this->numGroupe;
    }

    /**
     * Set dateCloture
     *
     * @param string $dateCloture
     * @return MdlReferentielPedagogie
     */
    public function setDateCloture($dateCloture)
    {
        $this->dateCloture = $dateCloture;

        return $this;
    }

    /**
     * Get dateCloture
     *
     * @return string 
     */
    public function getDateCloture()
    {
        return $this->dateCloture;
    }

    /**
     * Set formation
     *
     * @param string $formation
     * @return MdlReferentielPedagogie
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return string 
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set pedagogie
     *
     * @param string $pedagogie
     * @return MdlReferentielPedagogie
     */
    public function setPedagogie($pedagogie)
    {
        $this->pedagogie = $pedagogie;

        return $this;
    }

    /**
     * Get pedagogie
     *
     * @return string 
     */
    public function getPedagogie()
    {
        return $this->pedagogie;
    }

    /**
     * Set composante
     *
     * @param string $composante
     * @return MdlReferentielPedagogie
     */
    public function setComposante($composante)
    {
        $this->composante = $composante;

        return $this;
    }

    /**
     * Get composante
     *
     * @return string 
     */
    public function getComposante()
    {
        return $this->composante;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return MdlReferentielPedagogie
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
}
