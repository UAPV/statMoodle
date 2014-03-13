<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlEnrolAuthorize
 *
 * @ORM\Table(name="mdl_enrol_authorize", indexes={@ORM\Index(name="mdl_enroauth_cou_ix", columns={"courseid"}), @ORM\Index(name="mdl_enroauth_use_ix", columns={"userid"}), @ORM\Index(name="mdl_enroauth_sta_ix", columns={"status"}), @ORM\Index(name="mdl_enroauth_tra_ix", columns={"transid"})})
 * @ORM\Entity
 */
class MdlEnrolAuthorize
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
     * @ORM\Column(name="paymentmethod", type="string", length=6, nullable=false)
     */
    private $paymentmethod = 'cc';

    /**
     * @var integer
     *
     * @ORM\Column(name="refundinfo", type="smallint", nullable=false)
     */
    private $refundinfo = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ccname", type="string", length=255, nullable=false)
     */
    private $ccname = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="courseid", type="bigint", nullable=false)
     */
    private $courseid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="instanceid", type="bigint", nullable=false)
     */
    private $instanceid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="userid", type="bigint", nullable=false)
     */
    private $userid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="transid", type="bigint", nullable=false)
     */
    private $transid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="bigint", nullable=false)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="timecreated", type="bigint", nullable=false)
     */
    private $timecreated = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="settletime", type="bigint", nullable=false)
     */
    private $settletime = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=10, nullable=false)
     */
    private $amount = '';

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false)
     */
    private $currency = 'USD';



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
     * Set paymentmethod
     *
     * @param string $paymentmethod
     * @return MdlEnrolAuthorize
     */
    public function setPaymentmethod($paymentmethod)
    {
        $this->paymentmethod = $paymentmethod;

        return $this;
    }

    /**
     * Get paymentmethod
     *
     * @return string 
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }

    /**
     * Set refundinfo
     *
     * @param integer $refundinfo
     * @return MdlEnrolAuthorize
     */
    public function setRefundinfo($refundinfo)
    {
        $this->refundinfo = $refundinfo;

        return $this;
    }

    /**
     * Get refundinfo
     *
     * @return integer 
     */
    public function getRefundinfo()
    {
        return $this->refundinfo;
    }

    /**
     * Set ccname
     *
     * @param string $ccname
     * @return MdlEnrolAuthorize
     */
    public function setCcname($ccname)
    {
        $this->ccname = $ccname;

        return $this;
    }

    /**
     * Get ccname
     *
     * @return string 
     */
    public function getCcname()
    {
        return $this->ccname;
    }

    /**
     * Set courseid
     *
     * @param integer $courseid
     * @return MdlEnrolAuthorize
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
     * Set instanceid
     *
     * @param integer $instanceid
     * @return MdlEnrolAuthorize
     */
    public function setInstanceid($instanceid)
    {
        $this->instanceid = $instanceid;

        return $this;
    }

    /**
     * Get instanceid
     *
     * @return integer 
     */
    public function getInstanceid()
    {
        return $this->instanceid;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return MdlEnrolAuthorize
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
     * Set transid
     *
     * @param integer $transid
     * @return MdlEnrolAuthorize
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
     * Set status
     *
     * @param integer $status
     * @return MdlEnrolAuthorize
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set timecreated
     *
     * @param integer $timecreated
     * @return MdlEnrolAuthorize
     */
    public function setTimecreated($timecreated)
    {
        $this->timecreated = $timecreated;

        return $this;
    }

    /**
     * Get timecreated
     *
     * @return integer 
     */
    public function getTimecreated()
    {
        return $this->timecreated;
    }

    /**
     * Set settletime
     *
     * @param integer $settletime
     * @return MdlEnrolAuthorize
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

    /**
     * Set amount
     *
     * @param string $amount
     * @return MdlEnrolAuthorize
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
     * Set currency
     *
     * @param string $currency
     * @return MdlEnrolAuthorize
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
