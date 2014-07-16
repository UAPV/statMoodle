<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlEnrolAuthorizeRefunds
 *
 * @ORM\Table(name="mdl_enrol_authorize_refunds", indexes={@ORM\Index(name="mdl_enroauthrefu_tra_ix", columns={"transid"}), @ORM\Index(name="mdl_enroauthrefu_ord_ix", columns={"orderid"})})
 * @ORM\Entity
 */
class MdlEnrolAuthorizeRefunds
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
     * @ORM\Column(name="orderid", type="bigint", nullable=false)
     */
    private $orderid = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=10, nullable=false)
     */
    private $amount = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="transid", type="bigint", nullable=true)
     */
    private $transid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="settletime", type="bigint", nullable=false)
     */
    private $settletime = '0';



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
     * Set orderid
     *
     * @param integer $orderid
     * @return MdlEnrolAuthorizeRefunds
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get orderid
     *
     * @return integer 
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return MdlEnrolAuthorizeRefunds
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return MdlEnrolAuthorizeRefunds
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set transid
     *
     * @param integer $transid
     * @return MdlEnrolAuthorizeRefunds
     */
    public function setTransid($transid)
    {
        $this->transid = $transid;

        return $this;
    }

    /**
     * Get transid
     *
     * @return integer 
     */
    public function getTransid()
    {
        return $this->transid;
    }

    /**
     * Set settletime
     *
     * @param integer $settletime
     * @return MdlEnrolAuthorizeRefunds
     */
    public function setSettletime($settletime)
    {
        $this->settletime = $settletime;

        return $this;
    }

    /**
     * Get settletime
     *
     * @return integer 
     */
    public function getSettletime()
    {
        return $this->settletime;
    }
}
