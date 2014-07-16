<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuizStatistics
 *
 * @ORM\Table(name="mdl_quiz_statistics")
 * @ORM\Entity
 */
class MdlQuizStatistics
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
     * @ORM\Column(name="quizid", type="bigint", nullable=false)
     */
    private $quizid;

    /**
     * @var integer
     *
     * @ORM\Column(name="groupid", type="bigint", nullable=false)
     */
    private $groupid;

    /**
     * @var integer
     *
     * @ORM\Column(name="allattempts", type="smallint", nullable=false)
     */
    private $allattempts;

    /**
     * @var integer
     *
     * @ORM\Column(name="timemodified", type="bigint", nullable=false)
     */
    private $timemodified;

    /**
     * @var integer
     *
     * @ORM\Column(name="firstattemptscount", type="bigint", nullable=false)
     */
    private $firstattemptscount;

    /**
     * @var integer
     *
     * @ORM\Column(name="allattemptscount", type="bigint", nullable=false)
     */
    private $allattemptscount;

    /**
     * @var string
     *
     * @ORM\Column(name="firstattemptsavg", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $firstattemptsavg;

    /**
     * @var string
     *
     * @ORM\Column(name="allattemptsavg", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $allattemptsavg;

    /**
     * @var string
     *
     * @ORM\Column(name="median", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $median;

    /**
     * @var string
     *
     * @ORM\Column(name="standarddeviation", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $standarddeviation;

    /**
     * @var string
     *
     * @ORM\Column(name="skewness", type="decimal", precision=15, scale=10, nullable=true)
     */
    private $skewness;

    /**
     * @var string
     *
     * @ORM\Column(name="kurtosis", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $kurtosis;

    /**
     * @var string
     *
     * @ORM\Column(name="cic", type="decimal", precision=15, scale=10, nullable=true)
     */
    private $cic;

    /**
     * @var string
     *
     * @ORM\Column(name="errorratio", type="decimal", precision=15, scale=10, nullable=true)
     */
    private $errorratio;

    /**
     * @var string
     *
     * @ORM\Column(name="standarderror", type="decimal", precision=15, scale=10, nullable=true)
     */
    private $standarderror;



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
     * Set quizid
     *
     * @param integer $quizid
     * @return MdlQuizStatistics
     */
    public function setQuizid($quizid)
    {
        $this->quizid = $quizid;

        return $this;
    }

    /**
     * Get quizid
     *
     * @return integer 
     */
    public function getQuizid()
    {
        return $this->quizid;
    }

    /**
     * Set groupid
     *
     * @param integer $groupid
     * @return MdlQuizStatistics
     */
    public function setGroupid($groupid)
    {
        $this->groupid = $groupid;

        return $this;
    }

    /**
     * Get groupid
     *
     * @return integer 
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Set allattempts
     *
     * @param integer $allattempts
     * @return MdlQuizStatistics
     */
    public function setAllattempts($allattempts)
    {
        $this->allattempts = $allattempts;

        return $this;
    }

    /**
     * Get allattempts
     *
     * @return integer 
     */
    public function getAllattempts()
    {
        return $this->allattempts;
    }

    /**
     * Set timemodified
     *
     * @param integer $timemodified
     * @return MdlQuizStatistics
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
     * Set firstattemptscount
     *
     * @param integer $firstattemptscount
     * @return MdlQuizStatistics
     */
    public function setFirstattemptscount($firstattemptscount)
    {
        $this->firstattemptscount = $firstattemptscount;

        return $this;
    }

    /**
     * Get firstattemptscount
     *
     * @return integer 
     */
    public function getFirstattemptscount()
    {
        return $this->firstattemptscount;
    }

    /**
     * Set allattemptscount
     *
     * @param integer $allattemptscount
     * @return MdlQuizStatistics
     */
    public function setAllattemptscount($allattemptscount)
    {
        $this->allattemptscount = $allattemptscount;

        return $this;
    }

    /**
     * Get allattemptscount
     *
     * @return integer 
     */
    public function getAllattemptscount()
    {
        return $this->allattemptscount;
    }

    /**
     * Set firstattemptsavg
     *
     * @param string $firstattemptsavg
     * @return MdlQuizStatistics
     */
    public function setFirstattemptsavg($firstattemptsavg)
    {
        $this->firstattemptsavg = $firstattemptsavg;

        return $this;
    }

    /**
     * Get firstattemptsavg
     *
     * @return string 
     */
    public function getFirstattemptsavg()
    {
        return $this->firstattemptsavg;
    }

    /**
     * Set allattemptsavg
     *
     * @param string $allattemptsavg
     * @return MdlQuizStatistics
     */
    public function setAllattemptsavg($allattemptsavg)
    {
        $this->allattemptsavg = $allattemptsavg;

        return $this;
    }

    /**
     * Get allattemptsavg
     *
     * @return string 
     */
    public function getAllattemptsavg()
    {
        return $this->allattemptsavg;
    }

    /**
     * Set median
     *
     * @param string $median
     * @return MdlQuizStatistics
     */
    public function setMedian($median)
    {
        $this->median = $median;

        return $this;
    }

    /**
     * Get median
     *
     * @return string 
     */
    public function getMedian()
    {
        return $this->median;
    }

    /**
     * Set standarddeviation
     *
     * @param string $standarddeviation
     * @return MdlQuizStatistics
     */
    public function setStandarddeviation($standarddeviation)
    {
        $this->standarddeviation = $standarddeviation;

        return $this;
    }

    /**
     * Get standarddeviation
     *
     * @return string 
     */
    public function getStandarddeviation()
    {
        return $this->standarddeviation;
    }

    /**
     * Set skewness
     *
     * @param string $skewness
     * @return MdlQuizStatistics
     */
    public function setSkewness($skewness)
    {
        $this->skewness = $skewness;

        return $this;
    }

    /**
     * Get skewness
     *
     * @return string 
     */
    public function getSkewness()
    {
        return $this->skewness;
    }

    /**
     * Set kurtosis
     *
     * @param string $kurtosis
     * @return MdlQuizStatistics
     */
    public function setKurtosis($kurtosis)
    {
        $this->kurtosis = $kurtosis;

        return $this;
    }

    /**
     * Get kurtosis
     *
     * @return string 
     */
    public function getKurtosis()
    {
        return $this->kurtosis;
    }

    /**
     * Set cic
     *
     * @param string $cic
     * @return MdlQuizStatistics
     */
    public function setCic($cic)
    {
        $this->cic = $cic;

        return $this;
    }

    /**
     * Get cic
     *
     * @return string 
     */
    public function getCic()
    {
        return $this->cic;
    }

    /**
     * Set errorratio
     *
     * @param string $errorratio
     * @return MdlQuizStatistics
     */
    public function setErrorratio($errorratio)
    {
        $this->errorratio = $errorratio;

        return $this;
    }

    /**
     * Get errorratio
     *
     * @return string 
     */
    public function getErrorratio()
    {
        return $this->errorratio;
    }

    /**
     * Set standarderror
     *
     * @param string $standarderror
     * @return MdlQuizStatistics
     */
    public function setStandarderror($standarderror)
    {
        $this->standarderror = $standarderror;

        return $this;
    }

    /**
     * Get standarderror
     *
     * @return string 
     */
    public function getStandarderror()
    {
        return $this->standarderror;
    }
}
