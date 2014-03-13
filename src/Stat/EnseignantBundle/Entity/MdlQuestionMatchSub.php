<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuestionMatchSub
 *
 * @ORM\Table(name="mdl_question_match_sub", indexes={@ORM\Index(name="mdl_quesmatcsub_que_ix", columns={"question"})})
 * @ORM\Entity
 */
class MdlQuestionMatchSub
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
     * @ORM\Column(name="code", type="bigint", nullable=false)
     */
    private $code = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="question", type="bigint", nullable=false)
     */
    private $question = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="questiontext", type="text", nullable=false)
     */
    private $questiontext;

    /**
     * @var boolean
     *
     * @ORM\Column(name="questiontextformat", type="boolean", nullable=false)
     */
    private $questiontextformat = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="answertext", type="string", length=255, nullable=false)
     */
    private $answertext = '';



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
     * Set code
     *
     * @param integer $code
     * @return MdlQuestionMatchSub
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set question
     *
     * @param integer $question
     * @return MdlQuestionMatchSub
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return integer 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set questiontext
     *
     * @param string $questiontext
     * @return MdlQuestionMatchSub
     */
    public function setQuestiontext($questiontext)
    {
        $this->questiontext = $questiontext;

        return $this;
    }

    /**
     * Get questiontext
     *
     * @return string 
     */
    public function getQuestiontext()
    {
        return $this->questiontext;
    }

    /**
     * Set questiontextformat
     *
     * @param boolean $questiontextformat
     * @return MdlQuestionMatchSub
     */
    public function setQuestiontextformat($questiontextformat)
    {
        $this->questiontextformat = $questiontextformat;

        return $this;
    }

    /**
     * Get questiontextformat
     *
     * @return boolean 
     */
    public function getQuestiontextformat()
    {
        return $this->questiontextformat;
    }

    /**
     * Set answertext
     *
     * @param string $answertext
     * @return MdlQuestionMatchSub
     */
    public function setAnswertext($answertext)
    {
        $this->answertext = $answertext;

        return $this;
    }

    /**
     * Get answertext
     *
     * @return string 
     */
    public function getAnswertext()
    {
        return $this->answertext;
    }
}
