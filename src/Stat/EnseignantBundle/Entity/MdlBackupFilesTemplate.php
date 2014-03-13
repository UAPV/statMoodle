<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlBackupFilesTemplate
 *
 * @ORM\Table(name="mdl_backup_files_template", indexes={@ORM\Index(name="mdl_backfiletemp_bacconcomf_ix", columns={"backupid", "contextid", "component", "filearea", "itemid"})})
 * @ORM\Entity
 */
class MdlBackupFilesTemplate
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
     * @var integer
     *
     * @ORM\Column(name="contextid", type="bigint", nullable=false)
     */
    private $contextid;

    /**
     * @var string
     *
     * @ORM\Column(name="component", type="string", length=100, nullable=false)
     */
    private $component = '';

    /**
     * @var string
     *
     * @ORM\Column(name="filearea", type="string", length=50, nullable=false)
     */
    private $filearea = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="itemid", type="bigint", nullable=false)
     */
    private $itemid;

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
     * @return MdlBackupFilesTemplate
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
     * Set contextid
     *
     * @param integer $contextid
     * @return MdlBackupFilesTemplate
     */
    public function setContextid($contextid)
    {
        $this->contextid = $contextid;

        return $this;
    }

    /**
     * Get contextid
     *
     * @return integer 
     */
    public function getContextid()
    {
        return $this->contextid;
    }

    /**
     * Set component
     *
     * @param string $component
     * @return MdlBackupFilesTemplate
     */
    public function setComponent($component)
    {
        $this->component = $component;

        return $this;
    }

    /**
     * Get component
     *
     * @return string 
     */
    public function getComponent()
    {
        return $this->component;
    }

    /**
     * Set filearea
     *
     * @param string $filearea
     * @return MdlBackupFilesTemplate
     */
    public function setFilearea($filearea)
    {
        $this->filearea = $filearea;

        return $this;
    }

    /**
     * Get filearea
     *
     * @return string 
     */
    public function getFilearea()
    {
        return $this->filearea;
    }

    /**
     * Set itemid
     *
     * @param integer $itemid
     * @return MdlBackupFilesTemplate
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
     * Set info
     *
     * @param string $info
     * @return MdlBackupFilesTemplate
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
