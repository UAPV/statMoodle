<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReportCustomsqlQueries
 *
 * @ORM\Table(name="mdl_report_customsql_queries")
 * @ORM\Entity
 */
class MdlReportCustomsqlQueries
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
     * @ORM\Column(name="displayname", type="string", length=255, nullable=false)
     */
    private $displayname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="querysql", type="text", nullable=false)
     */
    private $querysql;

    /**
     * @var string
     *
     * @ORM\Column(name="queryparams", type="text", nullable=true)
     */
    private $queryparams;

    /**
     * @var integer
     *
     * @ORM\Column(name="querylimit", type="bigint", nullable=true)
     */
    private $querylimit = '5000';

    /**
     * @var string
     *
     * @ORM\Column(name="capability", type="string", length=255, nullable=false)
     */
    private $capability = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="lastrun", type="bigint", nullable=true)
     */
    private $lastrun = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="lastexecutiontime", type="bigint", nullable=true)
     */
    private $lastexecutiontime;

    /**
     * @var string
     *
     * @ORM\Column(name="runable", type="string", length=32, nullable=false)
     */
    private $runable = 'manual';

    /**
     * @var boolean
     *
     * @ORM\Column(name="singlerow", type="boolean", nullable=false)
     */
    private $singlerow = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="at", type="string", length=16, nullable=true)
     */
    private $at;

    /**
     * @var string
     *
     * @ORM\Column(name="emailto", type="string", length=255, nullable=true)
     */
    private $emailto;

    /**
     * @var string
     *
     * @ORM\Column(name="emailwhat", type="string", length=64, nullable=true)
     */
    private $emailwhat;



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
     * Set displayname
     *
     * @param string $displayname
     * @return MdlReportCustomsqlQueries
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = $displayname;

        return $this;
    }

    /**
     * Get displayname
     *
     * @return string 
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return MdlReportCustomsqlQueries
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set querysql
     *
     * @param string $querysql
     * @return MdlReportCustomsqlQueries
     */
    public function setQuerysql($querysql)
    {
        $this->querysql = $querysql;

        return $this;
    }

    /**
     * Get querysql
     *
     * @return string 
     */
    public function getQuerysql()
    {
        return $this->querysql;
    }

    /**
     * Set queryparams
     *
     * @param string $queryparams
     * @return MdlReportCustomsqlQueries
     */
    public function setQueryparams($queryparams)
    {
        $this->queryparams = $queryparams;

        return $this;
    }

    /**
     * Get queryparams
     *
     * @return string 
     */
    public function getQueryparams()
    {
        return $this->queryparams;
    }

    /**
     * Set querylimit
     *
     * @param integer $querylimit
     * @return MdlReportCustomsqlQueries
     */
    public function setQuerylimit($querylimit)
    {
        $this->querylimit = $querylimit;

        return $this;
    }

    /**
     * Get querylimit
     *
     * @return integer 
     */
    public function getQuerylimit()
    {
        return $this->querylimit;
    }

    /**
     * Set capability
     *
     * @param string $capability
     * @return MdlReportCustomsqlQueries
     */
    public function setCapability($capability)
    {
        $this->capability = $capability;

        return $this;
    }

    /**
     * Get capability
     *
     * @return string 
     */
    public function getCapability()
    {
        return $this->capability;
    }

    /**
     * Set lastrun
     *
     * @param integer $lastrun
     * @return MdlReportCustomsqlQueries
     */
    public function setLastrun($lastrun)
    {
        $this->lastrun = $lastrun;

        return $this;
    }

    /**
     * Get lastrun
     *
     * @return integer 
     */
    public function getLastrun()
    {
        return $this->lastrun;
    }

    /**
     * Set lastexecutiontime
     *
     * @param integer $lastexecutiontime
     * @return MdlReportCustomsqlQueries
     */
    public function setLastexecutiontime($lastexecutiontime)
    {
        $this->lastexecutiontime = $lastexecutiontime;

        return $this;
    }

    /**
     * Get lastexecutiontime
     *
     * @return integer 
     */
    public function getLastexecutiontime()
    {
        return $this->lastexecutiontime;
    }

    /**
     * Set runable
     *
     * @param string $runable
     * @return MdlReportCustomsqlQueries
     */
    public function setRunable($runable)
    {
        $this->runable = $runable;

        return $this;
    }

    /**
     * Get runable
     *
     * @return string 
     */
    public function getRunable()
    {
        return $this->runable;
    }

    /**
     * Set singlerow
     *
     * @param boolean $singlerow
     * @return MdlReportCustomsqlQueries
     */
    public function setSinglerow($singlerow)
    {
        $this->singlerow = $singlerow;

        return $this;
    }

    /**
     * Get singlerow
     *
     * @return boolean 
     */
    public function getSinglerow()
    {
        return $this->singlerow;
    }

    /**
     * Set at
     *
     * @param string $at
     * @return MdlReportCustomsqlQueries
     */
    public function setAt($at)
    {
        $this->at = $at;

        return $this;
    }

    /**
     * Get at
     *
     * @return string 
     */
    public function getAt()
    {
        return $this->at;
    }

    /**
     * Set emailto
     *
     * @param string $emailto
     * @return MdlReportCustomsqlQueries
     */
    public function setEmailto($emailto)
    {
        $this->emailto = $emailto;

        return $this;
    }

    /**
     * Get emailto
     *
     * @return string 
     */
    public function getEmailto()
    {
        return $this->emailto;
    }

    /**
     * Set emailwhat
     *
     * @param string $emailwhat
     * @return MdlReportCustomsqlQueries
     */
    public function setEmailwhat($emailwhat)
    {
        $this->emailwhat = $emailwhat;

        return $this;
    }

    /**
     * Get emailwhat
     *
     * @return string 
     */
    public function getEmailwhat()
    {
        return $this->emailwhat;
    }
}
