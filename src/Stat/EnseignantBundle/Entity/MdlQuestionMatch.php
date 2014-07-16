<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuestionMatch
 *
 * @ORM\Table(name="mdl_question_match", indexes={@ORM\Index(name="mdl_quesmatc_que_ix", columns={"question"})})
 * @ORM\Entity
 */
class MdlQuestionMatch
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
     * @ORM\Column(name="question", type="bigint", nullable=false)
     */
    private $question = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="subquestions", type="string", length=255, nullable=false)
     */
    private $subquestions = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="shuffleanswers", type="smallint", nullable=false)
     */
    private $shuffleanswers = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="correctfeedback", type="text", nullable=false)
     */
    private $correctfeedback;

    /**
     * @var boolean
     *
     * @ORM\Column(name="correctfeedbackformat", type="boolean", nullable=false)
     */
    private $correctfeedbackformat = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="partiallycorrectfeedback", type="text", nullable=false)
     */
    private $partiallycorrectfeedback;

    /**
     * @var boolean
     *
     * @ORM\Column(name="partiallycorrectfeedbackformat", type="boolean", nullable=false)
     */
    private $partiallycorrectfeedbackformat = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="incorrectfeedback", type="text", nullable=false)
     */
    private $incorrectfeedback;

    /**
     * @var boolean
     *
     * @ORM\Column(name="incorrectfeedbackformat", type="boolean", nullable=false)
     */
    private $incorrectfeedbackformat = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="shownumcorrect", type="boolean", nullable=false)
     */
    private $shownumcorrect = '0';



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
     * Set question
     *
     * @param integer $question
     * @return MdlQuestionMatch
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
     * Set subquestions
     *
     * @param string $subquestions
     * @return MdlQuestionMatch
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
     * Set shuffleanswers
     *
     * @param integer $shuffleanswers
     * @return MdlQuestionMatch
     */
    public function setShuffleanswers($shuffleanswers)
    {
        $this->shuffleanswers = $shuffleanswers;

        return $this;
    }

    /**
     * Get shuffleanswers
     *
     * @return integer 
     */
    public function getShuffleanswers()
    {
        return $this->shuffleanswers;
    }

    /**
     * Set correctfeedback
     *
     * @param string $correctfeedback
     * @return MdlQuestionMatch
     */
    public function setCorrectfeedback($correctfeedback)
    {
        $this->correctfeedback = $correctfeedback;

        return $this;
    }

    /**
     * Get correctfeedback
     *
     * @return string 
     */
    public function getCorrectfeedback()
    {
        return $this->correctfeedback;
    }

    /**
     * Set correctfeedbackformat
     *
     * @param boolean $correctfeedbackformat
     * @return MdlQuestionMatch
     */
    public function setCorrectfeedbackformat($correctfeedbackformat)
    {
        $this->correctfeedbackformat = $correctfeedbackformat;

        return $this;
    }

    /**
     * Get correctfeedbackformat
     *
     * @return boolean 
     */
    public function getCorrectfeedbackformat()
    {
        return $this->correctfeedbackformat;
    }

    /**
     * Set partiallycorrectfeedback
     *
     * @param string $partiallycorrectfeedback
     * @return MdlQuestionMatch
     */
    public function setPartiallycorrectfeedback($partiallycorrectfeedback)
    {
        $this->partiallycorrectfeedback = $partiallycorrectfeedback;

        return $this;
    }

    /**
     * Get partiallycorrectfeedback
     *
     * @return string 
     */
    public function getPartiallycorrectfeedback()
    {
        return $this->partiallycorrectfeedback;
    }

    /**
     * Set partiallycorrectfeedbackformat
     *
     * @param boolean $partiallycorrectfeedbackformat
     * @return MdlQuestionMatch
     */
    public function setPartiallycorrectfeedbackformat($partiallycorrectfeedbackformat)
    {
        $this->partiallycorrectfeedbackformat = $partiallycorrectfeedbackformat;

        return $this;
    }

    /**
     * Get partiallycorrectfeedbackformat
     *
     * @return boolean 
     */
    public function getPartiallycorrectfeedbackformat()
    {
        return $this->partiallycorrectfeedbackformat;
    }

    /**
     * Set incorrectfeedback
     *
     * @param string $incorrectfeedback
     * @return MdlQuestionMatch
     */
    public function setIncorrectfeedback($incorrectfeedback)
    {
        $this->incorrectfeedback = $incorrectfeedback;

        return $this;
    }

    /**
     * Get incorrectfeedback
     *
     * @return string 
     */
    public function getIncorrectfeedback()
    {
        return $this->incorrectfeedback;
    }

    /**
     * Set incorrectfeedbackformat
     *
     * @param boolean $incorrectfeedbackformat
     * @return MdlQuestionMatch
     */
    public function setIncorrectfeedbackformat($incorrectfeedbackformat)
    {
        $this->incorrectfeedbackformat = $incorrectfeedbackformat;

        return $this;
    }

    /**
     * Get incorrectfeedbackformat
     *
     * @return boolean 
     */
    public function getIncorrectfeedbackformat()
    {
        return $this->incorrectfeedbackformat;
    }

    /**
     * Set shownumcorrect
     *
     * @param boolean $shownumcorrect
     * @return MdlQuestionMatch
     */
    public function setShownumcorrect($shownumcorrect)
    {
        $this->shownumcorrect = $shownumcorrect;

        return $this;
    }

    /**
     * Get shownumcorrect
     *
     * @return boolean 
     */
    public function getShownumcorrect()
    {
        return $this->shownumcorrect;
    }
}
