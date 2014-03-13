<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielReferentiel
 *
 * @ORM\Table(name="mdl_referentiel_referentiel")
 * @ORM\Entity
 */
class MdlReferentielReferentiel
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
     * @ORM\Column(name="code_referentiel", type="string", length=20, nullable=false)
     */
    private $codeReferentiel = '';

    /**
     * @var string
     *
     * @ORM\Column(name="mail_auteur_referentiel", type="string", length=255, nullable=false)
     */
    private $mailAuteurReferentiel = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cle_referentiel", type="string", length=255, nullable=false)
     */
    private $cleReferentiel = '';

    /**
     * @var string
     *
     * @ORM\Column(name="pass_referentiel", type="string", length=255, nullable=false)
     */
    private $passReferentiel = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_referentiel", type="text", nullable=false)
     */
    private $descriptionReferentiel;

    /**
     * @var string
     *
     * @ORM\Column(name="url_referentiel", type="string", length=255, nullable=false)
     */
    private $urlReferentiel = '';

    /**
     * @var float
     *
     * @ORM\Column(name="seuil_certificat", type="float", precision=10, scale=0, nullable=false)
     */
    private $seuilCertificat = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="minima_certificat", type="bigint", nullable=false)
     */
    private $minimaCertificat = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="timemodified", type="bigint", nullable=false)
     */
    private $timemodified = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="nb_domaines", type="boolean", nullable=false)
     */
    private $nbDomaines = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="liste_codes_competence", type="text", nullable=false)
     */
    private $listeCodesCompetence;

    /**
     * @var string
     *
     * @ORM\Column(name="liste_empreintes_competence", type="text", nullable=false)
     */
    private $listeEmpreintesCompetence;

    /**
     * @var string
     *
     * @ORM\Column(name="liste_poids_competence", type="text", nullable=false)
     */
    private $listePoidsCompetence;

    /**
     * @var integer
     *
     * @ORM\Column(name="local", type="bigint", nullable=false)
     */
    private $local = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="logo_referentiel", type="string", length=255, nullable=false)
     */
    private $logoReferentiel = '';

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
     * @ORM\Column(name="label_domaine", type="string", length=80, nullable=true)
     */
    private $labelDomaine = '';

    /**
     * @var string
     *
     * @ORM\Column(name="label_competence", type="string", length=80, nullable=true)
     */
    private $labelCompetence = '';

    /**
     * @var string
     *
     * @ORM\Column(name="label_item", type="string", length=80, nullable=true)
     */
    private $labelItem = '';



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
     * @return MdlReferentielReferentiel
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
     * Set codeReferentiel
     *
     * @param string $codeReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setCodeReferentiel($codeReferentiel)
    {
        $this->codeReferentiel = $codeReferentiel;

        return $this;
    }

    /**
     * Get codeReferentiel
     *
     * @return string 
     */
    public function getCodeReferentiel()
    {
        return $this->codeReferentiel;
    }

    /**
     * Set mailAuteurReferentiel
     *
     * @param string $mailAuteurReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setMailAuteurReferentiel($mailAuteurReferentiel)
    {
        $this->mailAuteurReferentiel = $mailAuteurReferentiel;

        return $this;
    }

    /**
     * Get mailAuteurReferentiel
     *
     * @return string 
     */
    public function getMailAuteurReferentiel()
    {
        return $this->mailAuteurReferentiel;
    }

    /**
     * Set cleReferentiel
     *
     * @param string $cleReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setCleReferentiel($cleReferentiel)
    {
        $this->cleReferentiel = $cleReferentiel;

        return $this;
    }

    /**
     * Get cleReferentiel
     *
     * @return string 
     */
    public function getCleReferentiel()
    {
        return $this->cleReferentiel;
    }

    /**
     * Set passReferentiel
     *
     * @param string $passReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setPassReferentiel($passReferentiel)
    {
        $this->passReferentiel = $passReferentiel;

        return $this;
    }

    /**
     * Get passReferentiel
     *
     * @return string 
     */
    public function getPassReferentiel()
    {
        return $this->passReferentiel;
    }

    /**
     * Set descriptionReferentiel
     *
     * @param string $descriptionReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setDescriptionReferentiel($descriptionReferentiel)
    {
        $this->descriptionReferentiel = $descriptionReferentiel;

        return $this;
    }

    /**
     * Get descriptionReferentiel
     *
     * @return string 
     */
    public function getDescriptionReferentiel()
    {
        return $this->descriptionReferentiel;
    }

    /**
     * Set urlReferentiel
     *
     * @param string $urlReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setUrlReferentiel($urlReferentiel)
    {
        $this->urlReferentiel = $urlReferentiel;

        return $this;
    }

    /**
     * Get urlReferentiel
     *
     * @return string 
     */
    public function getUrlReferentiel()
    {
        return $this->urlReferentiel;
    }

    /**
     * Set seuilCertificat
     *
     * @param float $seuilCertificat
     * @return MdlReferentielReferentiel
     */
    public function setSeuilCertificat($seuilCertificat)
    {
        $this->seuilCertificat = $seuilCertificat;

        return $this;
    }

    /**
     * Get seuilCertificat
     *
     * @return float 
     */
    public function getSeuilCertificat()
    {
        return $this->seuilCertificat;
    }

    /**
     * Set minimaCertificat
     *
     * @param integer $minimaCertificat
     * @return MdlReferentielReferentiel
     */
    public function setMinimaCertificat($minimaCertificat)
    {
        $this->minimaCertificat = $minimaCertificat;

        return $this;
    }

    /**
     * Get minimaCertificat
     *
     * @return integer 
     */
    public function getMinimaCertificat()
    {
        return $this->minimaCertificat;
    }

    /**
     * Set timemodified
     *
     * @param integer $timemodified
     * @return MdlReferentielReferentiel
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
     * Set nbDomaines
     *
     * @param boolean $nbDomaines
     * @return MdlReferentielReferentiel
     */
    public function setNbDomaines($nbDomaines)
    {
        $this->nbDomaines = $nbDomaines;

        return $this;
    }

    /**
     * Get nbDomaines
     *
     * @return boolean 
     */
    public function getNbDomaines()
    {
        return $this->nbDomaines;
    }

    /**
     * Set listeCodesCompetence
     *
     * @param string $listeCodesCompetence
     * @return MdlReferentielReferentiel
     */
    public function setListeCodesCompetence($listeCodesCompetence)
    {
        $this->listeCodesCompetence = $listeCodesCompetence;

        return $this;
    }

    /**
     * Get listeCodesCompetence
     *
     * @return string 
     */
    public function getListeCodesCompetence()
    {
        return $this->listeCodesCompetence;
    }

    /**
     * Set listeEmpreintesCompetence
     *
     * @param string $listeEmpreintesCompetence
     * @return MdlReferentielReferentiel
     */
    public function setListeEmpreintesCompetence($listeEmpreintesCompetence)
    {
        $this->listeEmpreintesCompetence = $listeEmpreintesCompetence;

        return $this;
    }

    /**
     * Get listeEmpreintesCompetence
     *
     * @return string 
     */
    public function getListeEmpreintesCompetence()
    {
        return $this->listeEmpreintesCompetence;
    }

    /**
     * Set listePoidsCompetence
     *
     * @param string $listePoidsCompetence
     * @return MdlReferentielReferentiel
     */
    public function setListePoidsCompetence($listePoidsCompetence)
    {
        $this->listePoidsCompetence = $listePoidsCompetence;

        return $this;
    }

    /**
     * Get listePoidsCompetence
     *
     * @return string 
     */
    public function getListePoidsCompetence()
    {
        return $this->listePoidsCompetence;
    }

    /**
     * Set local
     *
     * @param integer $local
     * @return MdlReferentielReferentiel
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return integer 
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set logoReferentiel
     *
     * @param string $logoReferentiel
     * @return MdlReferentielReferentiel
     */
    public function setLogoReferentiel($logoReferentiel)
    {
        $this->logoReferentiel = $logoReferentiel;

        return $this;
    }

    /**
     * Get logoReferentiel
     *
     * @return string 
     */
    public function getLogoReferentiel()
    {
        return $this->logoReferentiel;
    }

    /**
     * Set config
     *
     * @param string $config
     * @return MdlReferentielReferentiel
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
     * @return MdlReferentielReferentiel
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
     * Set labelDomaine
     *
     * @param string $labelDomaine
     * @return MdlReferentielReferentiel
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
     * @return MdlReferentielReferentiel
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
     * @return MdlReferentielReferentiel
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
}
