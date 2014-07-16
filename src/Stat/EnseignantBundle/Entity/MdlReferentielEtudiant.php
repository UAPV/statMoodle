<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielEtudiant
 *
 * @ORM\Table(name="mdl_referentiel_etudiant", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_refeetud_use_uix", columns={"userid"})})
 * @ORM\Entity
 */
class MdlReferentielEtudiant
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
     * @ORM\Column(name="num_etudiant", type="string", length=20, nullable=true)
     */
    private $numEtudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="ddn_etudiant", type="string", length=14, nullable=true)
     */
    private $ddnEtudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="departement_naissance", type="string", length=255, nullable=true)
     */
    private $departementNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_etudiant", type="string", length=255, nullable=true)
     */
    private $adresseEtudiant;

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="bigint", nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_etablissement", type="bigint", nullable=true)
     */
    private $refEtablissement;



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
     * Set numEtudiant
     *
     * @param string $numEtudiant
     * @return MdlReferentielEtudiant
     */
    public function setNumEtudiant($numEtudiant)
    {
        $this->numEtudiant = $numEtudiant;

        return $this;
    }

    /**
     * Get numEtudiant
     *
     * @return string 
     */
    public function getNumEtudiant()
    {
        return $this->numEtudiant;
    }

    /**
     * Set ddnEtudiant
     *
     * @param string $ddnEtudiant
     * @return MdlReferentielEtudiant
     */
    public function setDdnEtudiant($ddnEtudiant)
    {
        $this->ddnEtudiant = $ddnEtudiant;

        return $this;
    }

    /**
     * Get ddnEtudiant
     *
     * @return string 
     */
    public function getDdnEtudiant()
    {
        return $this->ddnEtudiant;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     * @return MdlReferentielEtudiant
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get lieuNaissance
     *
     * @return string 
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set departementNaissance
     *
     * @param string $departementNaissance
     * @return MdlReferentielEtudiant
     */
    public function setDepartementNaissance($departementNaissance)
    {
        $this->departementNaissance = $departementNaissance;

        return $this;
    }

    /**
     * Get departementNaissance
     *
     * @return string 
     */
    public function getDepartementNaissance()
    {
        return $this->departementNaissance;
    }

    /**
     * Set adresseEtudiant
     *
     * @param string $adresseEtudiant
     * @return MdlReferentielEtudiant
     */
    public function setAdresseEtudiant($adresseEtudiant)
    {
        $this->adresseEtudiant = $adresseEtudiant;

        return $this;
    }

    /**
     * Get adresseEtudiant
     *
     * @return string 
     */
    public function getAdresseEtudiant()
    {
        return $this->adresseEtudiant;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return MdlReferentielEtudiant
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set refEtablissement
     *
     * @param integer $refEtablissement
     * @return MdlReferentielEtudiant
     */
    public function setRefEtablissement($refEtablissement)
    {
        $this->refEtablissement = $refEtablissement;

        return $this;
    }

    /**
     * Get refEtablissement
     *
     * @return integer 
     */
    public function getRefEtablissement()
    {
        return $this->refEtablissement;
    }
}
