<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielRepartition
 *
 * @ORM\Table(name="mdl_referentiel_repartition", indexes={@ORM\Index(name="mdl_referepa_ref_ix", columns={"ref_instance"}), @ORM\Index(name="mdl_referepa_ref2_ix", columns={"ref_occurrence"})})
 * @ORM\Entity
 */
class MdlReferentielRepartition
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
     * @ORM\Column(name="ref_instance", type="bigint", nullable=false)
     */
    private $refInstance = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_occurrence", type="bigint", nullable=false)
     */
    private $refOccurrence = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="courseid", type="bigint", nullable=false)
     */
    private $courseid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="teacherid", type="bigint", nullable=false)
     */
    private $teacherid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="code_item", type="string", length=20, nullable=false)
     */
    private $codeItem = '';



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
     * Set refInstance
     *
     * @param integer $refInstance
     * @return MdlReferentielRepartition
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
     * Set refOccurrence
     *
     * @param integer $refOccurrence
     * @return MdlReferentielRepartition
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
     * Set courseid
     *
     * @param integer $courseid
     * @return MdlReferentielRepartition
     */
    public function setCourseid($courseid)
    {
        $this->courseid = $courseid;

        return $this;
    }

    /**
     * Get courseid
     *
     * @return integer 
     */
    public function getCourseid()
    {
        return $this->courseid;
    }

    /**
     * Set teacherid
     *
     * @param integer $teacherid
     * @return MdlReferentielRepartition
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
     * Set codeItem
     *
     * @param string $codeItem
     * @return MdlReferentielRepartition
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
}
