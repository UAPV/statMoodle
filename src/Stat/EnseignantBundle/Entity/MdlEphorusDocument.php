<?php

namespace Stat\EnseignantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MdlEphorusDocument
 *
 * @ORM\Table(name="mdl_ephorus_document", indexes={@ORM\Index(name="mdl_ephodocu_gui_ix", columns={"guid"}), @ORM\Index(name="mdl_ephodocu_fil_ix", columns={"fileid"})})
 * @ORM\Entity
 */
class MdlEphorusDocument
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
     * @ORM\Column(name="guid", type="string", length=36, nullable=false)
     */
    private $guid = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="fileid", type="bigint", nullable=false)
     */
    private $fileid;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255, nullable=false)
     */
    private $filename = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contenthash", type="string", length=55, nullable=false)
     */
    private $contenthash = '';

    /**
     * @var string
     *
     * @ORM\Column(name="student_name", type="string", length=60, nullable=false)
     */
    private $studentName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="student_number", type="string", length=25, nullable=false)
     */
    private $studentNumber = '';

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=25, nullable=true)
     */
    private $date = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="percentage", type="bigint", nullable=true)
     */
    private $percentage = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="duplicate_original_guid", type="string", length=36, nullable=true)
     */
    private $duplicateOriginalGuid;

    /**
     * @var string
     *
     * @ORM\Column(name="duplicate_original_studentname", type="string", length=60, nullable=true)
     */
    private $duplicateOriginalStudentname;

    /**
     * @var string
     *
     * @ORM\Column(name="duplicate_original_studentnumber", type="string", length=25, nullable=true)
     */
    private $duplicateOriginalStudentnumber;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="status_description", type="string", length=255, nullable=true)
     */
    private $statusDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="string", length=255, nullable=true)
     */
    private $profile = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible = '1';

    /**
     * @var boolean
     *
     * @ORM\Column(name="processtype", type="boolean", nullable=false)
     */
    private $processtype = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="submission", type="bigint", nullable=true)
     */
    private $submission;



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
     * Set guid
     *
     * @param string $guid
     * @return MdlEphorusDocument
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Get guid
     *
     * @return string 
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set fileid
     *
     * @param integer $fileid
     * @return MdlEphorusDocument
     */
    public function setFileid($fileid)
    {
        $this->fileid = $fileid;

        return $this;
    }

    /**
     * Get fileid
     *
     * @return integer 
     */
    public function getFileid()
    {
        return $this->fileid;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return MdlEphorusDocument
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set contenthash
     *
     * @param string $contenthash
     * @return MdlEphorusDocument
     */
    public function setContenthash($contenthash)
    {
        $this->contenthash = $contenthash;

        return $this;
    }

    /**
     * Get contenthash
     *
     * @return string 
     */
    public function getContenthash()
    {
        return $this->contenthash;
    }

    /**
     * Set studentName
     *
     * @param string $studentName
     * @return MdlEphorusDocument
     */
    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;

        return $this;
    }

    /**
     * Get studentName
     *
     * @return string 
     */
    public function getStudentName()
    {
        return $this->studentName;
    }

    /**
     * Set studentNumber
     *
     * @param string $studentNumber
     * @return MdlEphorusDocument
     */
    public function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;

        return $this;
    }

    /**
     * Get studentNumber
     *
     * @return string 
     */
    public function getStudentNumber()
    {
        return $this->studentNumber;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return MdlEphorusDocument
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return MdlEphorusDocument
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return MdlEphorusDocument
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set percentage
     *
     * @param integer $percentage
     * @return MdlEphorusDocument
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return integer 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set duplicateOriginalGuid
     *
     * @param string $duplicateOriginalGuid
     * @return MdlEphorusDocument
     */
    public function setDuplicateOriginalGuid($duplicateOriginalGuid)
    {
        $this->duplicateOriginalGuid = $duplicateOriginalGuid;

        return $this;
    }

    /**
     * Get duplicateOriginalGuid
     *
     * @return string 
     */
    public function getDuplicateOriginalGuid()
    {
        return $this->duplicateOriginalGuid;
    }

    /**
     * Set duplicateOriginalStudentname
     *
     * @param string $duplicateOriginalStudentname
     * @return MdlEphorusDocument
     */
    public function setDuplicateOriginalStudentname($duplicateOriginalStudentname)
    {
        $this->duplicateOriginalStudentname = $duplicateOriginalStudentname;

        return $this;
    }

    /**
     * Get duplicateOriginalStudentname
     *
     * @return string 
     */
    public function getDuplicateOriginalStudentname()
    {
        return $this->duplicateOriginalStudentname;
    }

    /**
     * Set duplicateOriginalStudentnumber
     *
     * @param string $duplicateOriginalStudentnumber
     * @return MdlEphorusDocument
     */
    public function setDuplicateOriginalStudentnumber($duplicateOriginalStudentnumber)
    {
        $this->duplicateOriginalStudentnumber = $duplicateOriginalStudentnumber;

        return $this;
    }

    /**
     * Get duplicateOriginalStudentnumber
     *
     * @return string 
     */
    public function getDuplicateOriginalStudentnumber()
    {
        return $this->duplicateOriginalStudentnumber;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return MdlEphorusDocument
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statusDescription
     *
     * @param string $statusDescription
     * @return MdlEphorusDocument
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;

        return $this;
    }

    /**
     * Get statusDescription
     *
     * @return string 
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Set profile
     *
     * @param string $profile
     * @return MdlEphorusDocument
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return MdlEphorusDocument
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return MdlEphorusDocument
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set processtype
     *
     * @param boolean $processtype
     * @return MdlEphorusDocument
     */
    public function setProcesstype($processtype)
    {
        $this->processtype = $processtype;

        return $this;
    }

    /**
     * Get processtype
     *
     * @return boolean 
     */
    public function getProcesstype()
    {
        return $this->processtype;
    }

    /**
     * Set submission
     *
     * @param integer $submission
     * @return MdlEphorusDocument
     */
    public function setSubmission($submission)
    {
        $this->submission = $submission;

        return $this;
    }

    /**
     * Get submission
     *
     * @return integer 
     */
    public function getSubmission()
    {
        return $this->submission;
    }
}
