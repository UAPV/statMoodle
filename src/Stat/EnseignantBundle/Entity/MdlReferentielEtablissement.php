<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielEtablissement
 *
 * @ORM\Table(name="mdl_referentiel_etablissement")
 * @ORM\Entity
 */
class MdlReferentielEtablissement
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
     * @ORM\Column(name="num_etablissement", type="string", length=20, nullable=true)
     */
    private $numEtablissement = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nom_etablissement", type="string", length=80, nullable=true)
     */
    private $nomEtablissement = '';

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_etablissement", type="string", length=255, nullable=true)
     */
    private $adresseEtablissement = '';

    /**
     * @var string
     *
     * @ORM\Column(name="logo_etablissement", type="text", nullable=true)
     */
    private $logoEtablissement;



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
     * Set numEtablissement
     *
     * @param string $numEtablissement
     * @return MdlReferentielEtablissement
     */
    public function setNumEtablissement($numEtablissement)
    {
        $this->numEtablissement = $numEtablissement;

        return $this;
    }

    /**
     * Get numEtablissement
     *
     * @return string 
     */
    public function getNumEtablissement()
    {
        return $this->numEtablissement;
    }

    /**
     * Set nomEtablissement
     *
     * @param string $nomEtablissement
     * @return MdlReferentielEtablissement
     */
    public function setNomEtablissement($nomEtablissement)
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    /**
     * Get nomEtablissement
     *
     * @return string 
     */
    public function getNomEtablissement()
    {
        return $this->nomEtablissement;
    }

    /**
     * Set adresseEtablissement
     *
     * @param string $adresseEtablissement
     * @return MdlReferentielEtablissement
     */
    public function setAdresseEtablissement($adresseEtablissement)
    {
        $this->adresseEtablissement = $adresseEtablissement;

        return $this;
    }

    /**
     * Get adresseEtablissement
     *
     * @return string 
     */
    public function getAdresseEtablissement()
    {
        return $this->adresseEtablissement;
    }

    /**
     * Set logoEtablissement
     *
     * @param string $logoEtablissement
     * @return MdlReferentielEtablissement
     */
    public function setLogoEtablissement($logoEtablissement)
    {
        $this->logoEtablissement = $logoEtablissement;

        return $this;
    }

    /**
     * Get logoEtablissement
     *
     * @return string 
     */
    public function getLogoEtablissement()
    {
        return $this->logoEtablissement;
    }
}
