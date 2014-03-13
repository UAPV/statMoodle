<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentiel
 *
 * @ORM\Table(name="mdl_referentiel")
 * @ORM\Entity
 */
class MdlReferentiel
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
     * @ORM\Column(name="name", type="string", length=80, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_instance", type="text", nullable=false)
     */
    private $descriptionInstance;

    /**
     * @var string
     *
     * @ORM\Column(name="label_domaine", type="string", length=80, nullable=false)
     */
    private $labelDomaine = '';

    /**
     * @var string
     *
     * @ORM\Column(name="label_competence", type="string", length=80, nullable=false)
     */
    private $labelCompetence = '';

    /**
     * @var string
     *
     * @ORM\Column(name="label_item", type="string", length=80, nullable=false)
     */
    private $labelItem = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_instance", type="bigint", nullable=false)
     */
    private $dateInstance = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="course", type="bigint", nullable=false)
     */
    private $course = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_referentiel", type="bigint", nullable=false)
     */
    private $refReferentiel = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="config", type="string", length=255, nullable=false)
     */
    private $config = 'scol:0;creref:0;selref:0;impcert:0;graph:0;light:0;';

    /**
     * @var string
     *
     * @ORM\Column(name="config_impression", type="string", length=255, nullable=false)
     */
    private $configImpression = 'refcert:1;instcert:0;numetu:1;nometu:1;etabetu:0;ddnetu:0;lieuetu:0;adretu:0;detail:1;pourcent:0;compdec:0;compval:1;nomreferent:0;jurycert:1;comcert:0;';

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text", nullable=false)
     */
    private $intro;

    /**
     * @var integer
     *
     * @ORM\Column(name="introformat", type="smallint", nullable=false)
     */
    private $introformat = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="maxbytes", type="bigint", nullable=false)
     */
    private $maxbytes = '1073741824';



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
     * Set name
     *
     * @param string $name
     * @return MdlReferentiel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set descriptionInstance
     *
     * @param string $descriptionInstance
     * @return MdlReferentiel
     */
    public function setDescriptionInstance($descriptionInstance)
    {
        $this->descriptionInstance = $descriptionInstance;

        return $this;
    }

    /**
     * Get descriptionInstance
     *
     * @return string 
     */
    public function getDescriptionInstance()
    {
        return $this->descriptionInstance;
    }

    /**
     * Set labelDomaine
     *
     * @param string $labelDomaine
     * @return MdlReferentiel
     */
    public function setLabelDomaine($labelDomaine)
    {
        $this->labelDomaine = $labelDomaine;

        return $this;
    }

    /**
     * Get labelDomaine
     *
     * @return string 
     */
    public function getLabelDomaine()
    {
        return $this->labelDomaine;
    }

    /**
     * Set labelCompetence
     *
     * @param string $labelCompetence
     * @return MdlReferentiel
     */
    public function setLabelCompetence($labelCompetence)
    {
        $this->labelCompetence = $labelCompetence;

        return $this;
    }

    /**
     * Get labelCompetence
     *
     * @return string 
     */
    public function getLabelCompetence()
    {
        return $this->labelCompetence;
    }

    /**
     * Set labelItem
     *
     * @param string $labelItem
     * @return MdlReferentiel
     */
    public function setLabelItem($labelItem)
    {
        $this->labelItem = $labelItem;

        return $this;
    }

    /**
     * Get labelItem
     *
     * @return string 
     */
    public function getLabelItem()
    {
        return $this->labelItem;
    }

    /**
     * Set dateInstance
     *
     * @param integer $dateInstance
     * @return MdlReferentiel
     */
    public function setDateInstance($dateInstance)
    {
        $this->dateInstance = $dateInstance;

        return $this;
    }

    /**
     * Get dateInstance
     *
     * @return integer 
     */
    public function getDateInstance()
    {
        return $this->dateInstance;
    }

    /**
     * Set course
     *
     * @param integer $course
     * @return MdlReferentiel
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return integer 
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set refReferentiel
     *
     * @param integer $refReferentiel
     * @return MdlReferentiel
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
     * Set visible
     *
     * @param boolean $visible
     * @return MdlReferentiel
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set config
     *
     * @param string $config
     * @return MdlReferentiel
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get config
     *
     * @return string 
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set configImpression
     *
     * @param string $configImpression
     * @return MdlReferentiel
     */
    public function setConfigImpression($configImpression)
    {
        $this->configImpression = $configImpression;

        return $this;
    }

    /**
     * Get configImpression
     *
     * @return string 
     */
    public function getConfigImpression()
    {
        return $this->configImpression;
    }

    /**
     * Set intro
     *
     * @param string $intro
     * @return MdlReferentiel
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;

        return $this;
    }

    /**
     * Get intro
     *
     * @return string 
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set introformat
     *
     * @param integer $introformat
     * @return MdlReferentiel
     */
    public function setIntroformat($introformat)
    {
        $this->introformat = $introformat;

        return $this;
    }

    /**
     * Get introformat
     *
     * @return integer 
     */
    public function getIntroformat()
    {
        return $this->introformat;
    }

    /**
     * Set maxbytes
     *
     * @param integer $maxbytes
     * @return MdlReferentiel
     */
    public function setMaxbytes($maxbytes)
    {
        $this->maxbytes = $maxbytes;

        return $this;
    }

    /**
     * Get maxbytes
     *
     * @return integer 
     */
    public function getMaxbytes()
    {
        return $this->maxbytes;
    }
}
