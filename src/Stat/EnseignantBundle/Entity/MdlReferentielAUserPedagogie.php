<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielAUserPedagogie
 *
 * @ORM\Table(name="mdl_referentiel_a_user_pedagogie", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_refeauserpeda_userefre_uix", columns={"userid", "refrefid", "refpedago"})})
 * @ORM\Entity
 */
class MdlReferentielAUserPedagogie
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
     * @ORM\Column(name="userid", type="bigint", nullable=false)
     */
    private $userid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="refrefid", type="bigint", nullable=true)
     */
    private $refrefid;

    /**
     * @var integer
     *
     * @ORM\Column(name="refpedago", type="bigint", nullable=true)
     */
    private $refpedago;



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
     * Set userid
     *
     * @param integer $userid
     * @return MdlReferentielAUserPedagogie
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
     * Set refrefid
     *
     * @param integer $refrefid
     * @return MdlReferentielAUserPedagogie
     */
    public function setRefrefid($refrefid)
    {
        $this->refrefid = $refrefid;

        return $this;
    }

    /**
     * Get refrefid
     *
     * @return integer 
     */
    public function getRefrefid()
    {
        return $this->refrefid;
    }

    /**
     * Set refpedago
     *
     * @param integer $refpedago
     * @return MdlReferentielAUserPedagogie
     */
    public function setRefpedago($refpedago)
    {
        $this->refpedago = $refpedago;

        return $this;
    }

    /**
     * Get refpedago
     *
     * @return integer 
     */
    public function getRefpedago()
    {
        return $this->refpedago;
    }
}
