<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuestionMultichoice
 *
 * @ORM\Table(name="mdl_question_multichoice", indexes={@ORM\Index(name="mdl_quesmult_que2_ix", columns={"question"})})
 * @ORM\Entity
 */
class MdlQuestionMultichoice
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
     * @var integer
     *
     * @ORM\Column(name="layout", type="smallint", nullable=false)
     */
    private $layout = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="answers", type="string", length=255, nullable=false)
     */
    private $answers = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="single", type="smallint", nullable=false)
     */
    private $single = '0';

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
     * @var string
     *
     * @ORM\Column(name="answernumbering", type="string", length=10, nullable=false)
     */
    private $answernumbering = 'abc';

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
     * @return MdlQuestionMultichoice
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
     * Set layout
     *
     * @param integer $layout
     * @return MdlQuestionMultichoice
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return integer 
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Set answers
     *
     * @param string $answers
     * @return MdlQuestionMultichoice
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return string 
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set single
     *
     * @param integer $single
     * @return MdlQuestionMultichoice
     */
    public function setSingle($single)
    {
        $this->single = $single;

        return $this;
    }

    /**
     * Get single
     *
     * @return integer 
     */
    public function getSingle()
    {
        return $this->single;
    }

    /**
     * Set shuffleanswers
     *
     * @param integer $shuffleanswers
     * @return MdlQuestionMultichoice
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
     * @return MdlQuestionMultichoice
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
     * @return MdlQuestionMultichoice
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
     * @return MdlQuestionMultichoice
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
     * @return MdlQuestionMultichoice
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
     * @return MdlQuestionMultichoice
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
     * @return MdlQuestionMultichoice
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
     * Set answernumbering
     *
     * @param string $answernumbering
     * @return MdlQuestionMultichoice
     */
    public function setAnswernumbering($answernumbering)
    {
        $this->answernumbering = $answernumbering;

        return $this;
    }

    /**
     * Get answernumbering
     *
     * @return string 
     */
    public function getAnswernumbering()
    {
        return $this->answernumbering;
    }

    /**
     * Set shownumcorrect
     *
     * @param boolean $shownumcorrect
     * @return MdlQuestionMultichoice
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
