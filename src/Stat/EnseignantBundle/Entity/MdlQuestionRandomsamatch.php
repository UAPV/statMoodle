<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlQuestionRandomsamatch
 *
 * @ORM\Table(name="mdl_question_randomsamatch", indexes={@ORM\Index(name="mdl_quesrand_que_ix", columns={"question"})})
 * @ORM\Entity
 */
class MdlQuestionRandomsamatch
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
     * @ORM\Column(name="choose", type="bigint", nullable=false)
     */
    private $choose = '4';



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
     * @return MdlQuestionRandomsamatch
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
     * Set choose
     *
     * @param integer $choose
     * @return MdlQuestionRandomsamatch
     */
    public function setChoose($choose)
    {
        $this->choose = $choose;

        return $this;
    }

    /**
     * Get choose
     *
     * @return integer 
     */
    public function getChoose()
    {
        return $this->choose;
    }
}
