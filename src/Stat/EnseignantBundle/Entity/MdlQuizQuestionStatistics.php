<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuizQuestionStatistics
 *
 * @ORM\Table(name="mdl_quiz_question_statistics")
 * @ORM\Entity
 */
class MdlQuizQuestionStatistics
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
     * @ORM\Column(name="quizstatisticsid", type="bigint", nullable=false)
     */
    private $quizstatisticsid;

    /**
     * @var integer
     *
     * @ORM\Column(name="questionid", type="bigint", nullable=false)
     */
    private $questionid;

    /**
     * @var integer
     *
     * @ORM\Column(name="slot", type="bigint", nullable=true)
     */
    private $slot;

    /**
     * @var integer
     *
     * @ORM\Column(name="subquestion", type="smallint", nullable=false)
     */
    private $subquestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="s", type="bigint", nullable=false)
     */
    private $s = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="effectiveweight", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $effectiveweight;

    /**
     * @var boolean
     *
     * @ORM\Column(name="negcovar", type="boolean", nullable=false)
     */
    private $negcovar = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="discriminationindex", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $discriminationindex;

    /**
     * @var string
     *
     * @ORM\Column(name="discriminativeefficiency", type="decimal", precision=15, scale=5, nullable=true)
     */
    private $discriminativeefficiency;

    /**
     * @var string
     *
     * @ORM\Column(name="sd", type="decimal", precision=15, scale=10, nullable=true)
     */
    private $sd;

    /**
     * @var string
     *
     * @ORM\Column(name="facility", type="decimal", precision=15, scale=10, nullable=true)
     */
    private $facility;

    /**
     * @var string
     *
     * @ORM\Column(name="subquestions", type="text", nullable=true)
     */
    private $subquestions;

    /**
     * @var string
     *
     * @ORM\Column(name="maxmark", type="decimal", precision=12, scale=7, nullable=true)
     */
    private $maxmark;

    /**
     * @var string
     *
     * @ORM\Column(name="positions", type="text", nullable=true)
     */
    private $positions;

    /**
     * @var string
     *
     * @ORM\Column(name="randomguessscore", type="decimal", precision=12, scale=7, nullable=true)
     */
    private $randomguessscore;



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
     * Set quizstatisticsid
     *
     * @param integer $quizstatisticsid
     * @return MdlQuizQuestionStatistics
     */
    public function setQuizstatisticsid($quizstatisticsid)
    {
        $this->quizstatisticsid = $quizstatisticsid;

        return $this;
    }

    /**
     * Get quizstatisticsid
     *
     * @return integer 
     */
    public function getQuizstatisticsid()
    {
        return $this->quizstatisticsid;
    }

    /**
     * Set questionid
     *
     * @param integer $questionid
     * @return MdlQuizQuestionStatistics
     */
    public function setQuestionid($questionid)
    {
        $this->questionid = $questionid;

        return $this;
    }

    /**
     * Get questionid
     *
     * @return integer 
     */
    public function getQuestionid()
    {
        return $this->questionid;
    }

    /**
     * Set slot
     *
     * @param integer $slot
     * @return MdlQuizQuestionStatistics
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;

        return $this;
    }

    /**
     * Get slot
     *
     * @return integer 
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * Set subquestion
     *
     * @param integer $subquestion
     * @return MdlQuizQuestionStatistics
     */
    public function setSubquestion($subquestion)
    {
        $this->subquestion = $subquestion;

        return $this;
    }

    /**
     * Get subquestion
     *
     * @return integer 
     */
    public function getSubquestion()
    {
        return $this->subquestion;
    }

    /**
     * Set s
     *
     * @param integer $s
     * @return MdlQuizQuestionStatistics
     */
    public function setS($s)
    {
        $this->s = $s;

        return $this;
    }

    /**
     * Get s
     *
     * @return integer 
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * Set effectiveweight
     *
     * @param string $effectiveweight
     * @return MdlQuizQuestionStatistics
     */
    public function setEffectiveweight($effectiveweight)
    {
        $this->effectiveweight = $effectiveweight;

        return $this;
    }

    /**
     * Get effectiveweight
     *
     * @return string 
     */
    public function getEffectiveweight()
    {
        return $this->effectiveweight;
    }

    /**
     * Set negcovar
     *
     * @param boolean $negcovar
     * @return MdlQuizQuestionStatistics
     */
    public function setNegcovar($negcovar)
    {
        $this->negcovar = $negcovar;

        return $this;
    }

    /**
     * Get negcovar
     *
     * @return boolean 
     */
    public function getNegcovar()
    {
        return $this->negcovar;
    }

    /**
     * Set discriminationindex
     *
     * @param string $discriminationindex
     * @return MdlQuizQuestionStatistics
     */
    public function setDiscriminationindex($discriminationindex)
    {
        $this->discriminationindex = $discriminationindex;

        return $this;
    }

    /**
     * Get discriminationindex
     *
     * @return string 
     */
    public function getDiscriminationindex()
    {
        return $this->discriminationindex;
    }

    /**
     * Set discriminativeefficiency
     *
     * @param string $discriminativeefficiency
     * @return MdlQuizQuestionStatistics
     */
    public function setDiscriminativeefficiency($discriminativeefficiency)
    {
        $this->discriminativeefficiency = $discriminativeefficiency;

        return $this;
    }

    /**
     * Get discriminativeefficiency
     *
     * @return string 
     */
    public function getDiscriminativeefficiency()
    {
        return $this->discriminativeefficiency;
    }

    /**
     * Set sd
     *
     * @param string $sd
     * @return MdlQuizQuestionStatistics
     */
    public function setSd($sd)
    {
        $this->sd = $sd;

        return $this;
    }

    /**
     * Get sd
     *
     * @return string 
     */
    public function getSd()
    {
        return $this->sd;
    }

    /**
     * Set facility
     *
     * @param string $facility
     * @return MdlQuizQuestionStatistics
     */
    public function setFacility($facility)
    {
        $this->facility = $facility;

        return $this;
    }

    /**
     * Get facility
     *
     * @return string 
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * Set subquestions
     *
     * @param string $subquestions
     * @return MdlQuizQuestionStatistics
     */
    public function setSubquestions($subquestions)
    {
        $this->subquestions = $subquestions;

        return $this;
    }

    /**
     * Get subquestions
     *
     * @return string 
     */
    public function getSubquestions()
    {
        return $this->subquestions;
    }

    /**
     * Set maxmark
     *
     * @param string $maxmark
     * @return MdlQuizQuestionStatistics
     */
    public function setMaxmark($maxmark)
    {
        $this->maxmark = $maxmark;

        return $this;
    }

    /**
     * Get maxmark
     *
     * @return string 
     */
    public function getMaxmark()
    {
        return $this->maxmark;
    }

    /**
     * Set positions
     *
     * @param string $positions
     * @return MdlQuizQuestionStatistics
     */
    public function setPositions($positions)
    {
        $this->positions = $positions;

        return $this;
    }

    /**
     * Get positions
     *
     * @return string 
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Set randomguessscore
     *
     * @param string $randomguessscore
     * @return MdlQuizQuestionStatistics
     */
    public function setRandomguessscore($randomguessscore)
    {
        $this->randomguessscore = $randomguessscore;

        return $this;
    }

    /**
     * Get randomguessscore
     *
     * @return string 
     */
    public function getRandomguessscore()
    {
        return $this->randomguessscore;
    }
}
