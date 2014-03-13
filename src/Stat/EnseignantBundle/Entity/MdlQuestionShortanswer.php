<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuestionShortanswer
 *
 * @ORM\Table(name="mdl_question_shortanswer", indexes={@ORM\Index(name="mdl_quesshor_que_ix", columns={"question"})})
 * @ORM\Entity
 */
class MdlQuestionShortanswer
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
     * @ORM\Column(name="answers", type="string", length=255, nullable=false)
     */
    private $answers = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="usecase", type="boolean", nullable=false)
     */
    private $usecase = '0';



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
     * @return MdlQuestionShortanswer
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
     * Set answers
     *
     * @param string $answers
     * @return MdlQuestionShortanswer
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
     * Set usecase
     *
     * @param boolean $usecase
     * @return MdlQuestionShortanswer
     */
    public function setUsecase($usecase)
    {
        $this->usecase = $usecase;

        return $this;
    }

    /**
     * Get usecase
     *
     * @return boolean 
     */
    public function getUsecase()
    {
        return $this->usecase;
    }
}
