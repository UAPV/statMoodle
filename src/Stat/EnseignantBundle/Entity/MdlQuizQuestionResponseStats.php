<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuizQuestionResponseStats
 *
 * @ORM\Table(name="mdl_quiz_question_response_stats")
 * @ORM\Entity
 */
class MdlQuizQuestionResponseStats
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
     * @ORM\Column(name="subqid", type="bigint", nullable=false)
     */
    private $subqid;

    /**
     * @var integer
     *
     * @ORM\Column(name="aid", type="bigint", nullable=true)
     */
    private $aid;

    /**
     * @var string
     *
     * @ORM\Column(name="response", type="text", nullable=true)
     */
    private $response;

    /**
     * @var integer
     *
     * @ORM\Column(name="rcount", type="bigint", nullable=true)
     */
    private $rcount;

    /**
     * @var string
     *
     * @ORM\Column(name="credit", type="decimal", precision=15, scale=5, nullable=false)
     */
    private $credit;



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
     * @return MdlQuizQuestionResponseStats
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
     * @return MdlQuizQuestionResponseStats
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
     * Set subqid
     *
     * @param integer $subqid
     * @return MdlQuizQuestionResponseStats
     */
    public function setSubqid($subqid)
    {
        $this->subqid = $subqid;

        return $this;
    }

    /**
     * Get subqid
     *
     * @return integer 
     */
    public function getSubqid()
    {
        return $this->subqid;
    }

    /**
     * Set aid
     *
     * @param integer $aid
     * @return MdlQuizQuestionResponseStats
     */
    public function setAid($aid)
    {
        $this->aid = $aid;

        return $this;
    }

    /**
     * Get aid
     *
     * @return integer 
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * Set response
     *
     * @param string $response
     * @return MdlQuizQuestionResponseStats
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * Get response
     *
     * @return string 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set rcount
     *
     * @param integer $rcount
     * @return MdlQuizQuestionResponseStats
     */
    public function setRcount($rcount)
    {
        $this->rcount = $rcount;

        return $this;
    }

    /**
     * Get rcount
     *
     * @return integer 
     */
    public function getRcount()
    {
        return $this->rcount;
    }

    /**
     * Set credit
     *
     * @param string $credit
     * @return MdlQuizQuestionResponseStats
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return string 
     */
    public function getCredit()
    {
        return $this->credit;
    }
}
