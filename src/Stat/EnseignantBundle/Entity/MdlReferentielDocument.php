<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielDocument
 *
 * @ORM\Table(name="mdl_referentiel_document", indexes={@ORM\Index(name="mdl_refedocu_ref_ix", columns={"ref_activite"})})
 * @ORM\Entity
 */
class MdlReferentielDocument
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
     * @ORM\Column(name="type_document", type="string", length=20, nullable=false)
     */
    private $typeDocument = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_document", type="text", nullable=false)
     */
    private $descriptionDocument;

    /**
     * @var string
     *
     * @ORM\Column(name="url_document", type="string", length=255, nullable=false)
     */
    private $urlDocument = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_activite", type="bigint", nullable=false)
     */
    private $refActivite;

    /**
     * @var integer
     *
     * @ORM\Column(name="cible_document", type="smallint", nullable=false)
     */
    private $cibleDocument = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="etiquette_document", type="string", length=255, nullable=false)
     */
    private $etiquetteDocument = '';



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
     * Set typeDocument
     *
     * @param string $typeDocument
     * @return MdlReferentielDocument
     */
    public function setTypeDocument($typeDocument)
    {
        $this->typeDocument = $typeDocument;

        return $this;
    }

    /**
     * Get typeDocument
     *
     * @return string 
     */
    public function getTypeDocument()
    {
        return $this->typeDocument;
    }

    /**
     * Set descriptionDocument
     *
     * @param string $descriptionDocument
     * @return MdlReferentielDocument
     */
    public function setDescriptionDocument($descriptionDocument)
    {
        $this->descriptionDocument = $descriptionDocument;

        return $this;
    }

    /**
     * Get descriptionDocument
     *
     * @return string 
     */
    public function getDescriptionDocument()
    {
        return $this->descriptionDocument;
    }

    /**
     * Set urlDocument
     *
     * @param string $urlDocument
     * @return MdlReferentielDocument
     */
    public function setUrlDocument($urlDocument)
    {
        $this->urlDocument = $urlDocument;

        return $this;
    }

    /**
     * Get urlDocument
     *
     * @return string 
     */
    public function getUrlDocument()
    {
        return $this->urlDocument;
    }

    /**
     * Set refActivite
     *
     * @param integer $refActivite
     * @return MdlReferentielDocument
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

    /**
     * Set cibleDocument
     *
     * @param integer $cibleDocument
     * @return MdlReferentielDocument
     */
    public function setCibleDocument($cibleDocument)
    {
        $this->cibleDocument = $cibleDocument;

        return $this;
    }

    /**
     * Get cibleDocument
     *
     * @return integer 
     */
    public function getCibleDocument()
    {
        return $this->cibleDocument;
    }

    /**
     * Set etiquetteDocument
     *
     * @param string $etiquetteDocument
     * @return MdlReferentielDocument
     */
    public function setEtiquetteDocument($etiquetteDocument)
    {
        $this->etiquetteDocument = $etiquetteDocument;

        return $this;
    }

    /**
     * Get etiquetteDocument
     *
     * @return string 
     */
    public function getEtiquetteDocument()
    {
        return $this->etiquetteDocument;
    }
}
