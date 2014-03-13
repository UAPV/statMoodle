<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielConsigne
 *
 * @ORM\Table(name="mdl_referentiel_consigne")
 * @ORM\Entity
 */
class MdlReferentielConsigne
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
     * @ORM\Column(name="type_consigne", type="string", length=20, nullable=false)
     */
    private $typeConsigne = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_consigne", type="text", nullable=false)
     */
    private $descriptionConsigne;

    /**
     * @var string
     *
     * @ORM\Column(name="url_consigne", type="string", length=255, nullable=false)
     */
    private $urlConsigne = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_task", type="bigint", nullable=false)
     */
    private $refTask;

    /**
     * @var integer
     *
     * @ORM\Column(name="cible_consigne", type="smallint", nullable=false)
     */
    private $cibleConsigne = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="etiquette_consigne", type="string", length=255, nullable=false)
     */
    private $etiquetteConsigne = '';



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
     * Set typeConsigne
     *
     * @param string $typeConsigne
     * @return MdlReferentielConsigne
     */
    public function setTypeConsigne($typeConsigne)
    {
        $this->typeConsigne = $typeConsigne;

        return $this;
    }

    /**
     * Get typeConsigne
     *
     * @return string 
     */
    public function getTypeConsigne()
    {
        return $this->typeConsigne;
    }

    /**
     * Set descriptionConsigne
     *
     * @param string $descriptionConsigne
     * @return MdlReferentielConsigne
     */
    public function setDescriptionConsigne($descriptionConsigne)
    {
        $this->descriptionConsigne = $descriptionConsigne;

        return $this;
    }

    /**
     * Get descriptionConsigne
     *
     * @return string 
     */
    public function getDescriptionConsigne()
    {
        return $this->descriptionConsigne;
    }

    /**
     * Set urlConsigne
     *
     * @param string $urlConsigne
     * @return MdlReferentielConsigne
     */
    public function setUrlConsigne($urlConsigne)
    {
        $this->urlConsigne = $urlConsigne;

        return $this;
    }

    /**
     * Get urlConsigne
     *
     * @return string 
     */
    public function getUrlConsigne()
    {
        return $this->urlConsigne;
    }

    /**
     * Set refTask
     *
     * @param integer $refTask
     * @return MdlReferentielConsigne
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
     * Set cibleConsigne
     *
     * @param integer $cibleConsigne
     * @return MdlReferentielConsigne
     */
    public function setCibleConsigne($cibleConsigne)
    {
        $this->cibleConsigne = $cibleConsigne;

        return $this;
    }

    /**
     * Get cibleConsigne
     *
     * @return integer 
     */
    public function getCibleConsigne()
    {
        return $this->cibleConsigne;
    }

    /**
     * Set etiquetteConsigne
     *
     * @param string $etiquetteConsigne
     * @return MdlReferentielConsigne
     */
    public function setEtiquetteConsigne($etiquetteConsigne)
    {
        $this->etiquetteConsigne = $etiquetteConsigne;

        return $this;
    }

    /**
     * Get etiquetteConsigne
     *
     * @return string 
     */
    public function getEtiquetteConsigne()
    {
        return $this->etiquetteConsigne;
    }
}
