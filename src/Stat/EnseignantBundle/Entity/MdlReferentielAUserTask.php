<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlReferentielAUserTask
 *
 * @ORM\Table(name="mdl_referentiel_a_user_task", indexes={@ORM\Index(name="mdl_refeausertask_ref_ix", columns={"ref_task"})})
 * @ORM\Entity
 */
class MdlReferentielAUserTask
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
     * @ORM\Column(name="ref_user", type="bigint", nullable=false)
     */
    private $refUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_task", type="bigint", nullable=false)
     */
    private $refTask;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_selection", type="bigint", nullable=false)
     */
    private $dateSelection = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="ref_activite", type="bigint", nullable=false)
     */
    private $refActivite;



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
     * Set refUser
     *
     * @param integer $refUser
     * @return MdlReferentielAUserTask
     */
    public function setRefUser($refUser)
    {
        $this->refUser = $refUser;

        return $this;
    }

    /**
     * Get refUser
     *
     * @return integer 
     */
    public function getRefUser()
    {
        return $this->refUser;
    }

    /**
     * Set refTask
     *
     * @param integer $refTask
     * @return MdlReferentielAUserTask
     */
    public function setRefTask($refTask)
    {
        $this->refTask = $refTask;

        return $this;
    }

    /**
     * Get refTask
     *
     * @return integer 
     */
    public function getRefTask()
    {
        return $this->refTask;
    }

    /**
     * Set dateSelection
     *
     * @param integer $dateSelection
     * @return MdlReferentielAUserTask
     */
    public function setDateSelection($dateSelection)
    {
        $this->dateSelection = $dateSelection;

        return $this;
    }

    /**
     * Get dateSelection
     *
     * @return integer 
     */
    public function getDateSelection()
    {
        return $this->dateSelection;
    }

    /**
     * Set refActivite
     *
     * @param integer $refActivite
     * @return MdlReferentielAUserTask
     */
    public function setRefActivite($refActivite)
    {
        $this->refActivite = $refActivite;

        return $this;
    }

    /**
     * Get refActivite
     *
     * @return integer 
     */
    public function getRefActivite()
    {
        return $this->refActivite;
    }
}
