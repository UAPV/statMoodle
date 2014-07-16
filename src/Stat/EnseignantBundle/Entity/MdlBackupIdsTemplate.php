<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlBackupIdsTemplate
 *
 * @ORM\Table(name="mdl_backup_ids_template", uniqueConstraints={@ORM\UniqueConstraint(name="mdl_backidstemp_baciteite_uix", columns={"backupid", "itemname", "itemid"})}, indexes={@ORM\Index(name="mdl_backidstemp_bacitepar_ix", columns={"backupid", "itemname", "parentitemid"}), @ORM\Index(name="mdl_backidstemp_bacitenew_ix", columns={"backupid", "itemname", "newitemid"})})
 * @ORM\Entity
 */
class MdlBackupIdsTemplate
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
     * @ORM\Column(name="backupid", type="string", length=32, nullable=false)
     */
    private $backupid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="itemname", type="string", length=160, nullable=false)
     */
    private $itemname = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="itemid", type="bigint", nullable=false)
     */
    private $itemid;

    /**
     * @var integer
     *
     * @ORM\Column(name="newitemid", type="bigint", nullable=false)
     */
    private $newitemid = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="parentitemid", type="bigint", nullable=true)
     */
    private $parentitemid;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", nullable=true)
     */
    private $info;



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
     * Set backupid
     *
     * @param string $backupid
     * @return MdlBackupIdsTemplate
     */
    public function setBackupid($backupid)
    {
        $this->backupid = $backupid;

        return $this;
    }

    /**
     * Get backupid
     *
     * @return string 
     */
    public function getBackupid()
    {
        return $this->backupid;
    }

    /**
     * Set itemname
     *
     * @param string $itemname
     * @return MdlBackupIdsTemplate
     */
    public function setItemname($itemname)
    {
        $this->itemname = $itemname;

        return $this;
    }

    /**
     * Get itemname
     *
     * @return string 
     */
    public function getItemname()
    {
        return $this->itemname;
    }

    /**
     * Set itemid
     *
     * @param integer $itemid
     * @return MdlBackupIdsTemplate
     */
    public function setItemid($itemid)
    {
        $this->itemid = $itemid;

        return $this;
    }

    /**
     * Get itemid
     *
     * @return integer 
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * Set newitemid
     *
     * @param integer $newitemid
     * @return MdlBackupIdsTemplate
     */
    public function setNewitemid($newitemid)
    {
        $this->newitemid = $newitemid;

        return $this;
    }

    /**
     * Get newitemid
     *
     * @return integer 
     */
    public function getNewitemid()
    {
        return $this->newitemid;
    }

    /**
     * Set parentitemid
     *
     * @param integer $parentitemid
     * @return MdlBackupIdsTemplate
     */
    public function setParentitemid($parentitemid)
    {
        $this->parentitemid = $parentitemid;

        return $this;
    }

    /**
     * Get parentitemid
     *
     * @return integer 
     */
    public function getParentitemid()
    {
        return $this->parentitemid;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return MdlBackupIdsTemplate
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }
}
