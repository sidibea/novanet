<?php

namespace IN\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incident
 *
 * @ORM\Table(name="incident")
 * @ORM\Entity(repositoryClass="IN\CoreBundle\Repository\IncidentRepository")
 */
class Incident
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ticket_code", type="string", length=255)
     */
    private $ticketCode;

    /**
     * @var string
     *
     * @ORM\Column(name="created_by", type="string", length=255)
     */
    private $createdBy;

    /**
     * @var string
     *
     * @ORM\Column(name="impacts", nullable=true, type="string", length=255)
     */
    private $impacts;

    /**
     * @ORM\ManyToOne(targetEntity="IN\CoreBundle\Entity\Site", inversedBy="incidents")
     * @ORM\JoinColumn(name="code_site", referencedColumnName="code_site")
     */
    private $site;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="occured_at", type="datetime")
     */
    private $occuredAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ticket_created_at", type="datetime")
     */
    private $ticketCreatedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="integer")
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="problem_type", nullable=true, type="string", length=255)
     */
    private $problemType;

    /**
     * @var string
     *
     * @ORM\Column(name="site_canonical", nullable=true, type="string", length=255)
     */
    private $siteCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_closed", type="boolean")
     */
    private $isClosed;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ticketCode
     *
     * @param string $ticketCode
     *
     * @return Incident
     */
    public function setTicketCode($ticketCode)
    {
        $this->ticketCode = $ticketCode;

        return $this;
    }

    /**
     * Get ticketCode
     *
     * @return string
     */
    public function getTicketCode()
    {
        return $this->ticketCode;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return Incident
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set site
     *
     * @param string $site
     *
     * @return Incident
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set occuredAt
     *
     * @param \DateTime $occuredAt
     *
     * @return Incident
     */
    public function setOccuredAt($occuredAt)
    {
        $this->occuredAt = $occuredAt;

        return $this;
    }

    /**
     * Get occuredAt
     *
     * @return \DateTime
     */
    public function getOccuredAt()
    {
        return $this->occuredAt;
    }

    /**
     * Set ticketCreatedAt
     *
     * @param \DateTime $ticketCreatedAt
     *
     * @return Incident
     */
    public function setTicketCreatedAt($ticketCreatedAt)
    {
        $this->ticketCreatedAt = $ticketCreatedAt;

        return $this;
    }

    /**
     * Get ticketCreatedAt
     *
     * @return \DateTime
     */
    public function getTicketCreatedAt()
    {
        return $this->ticketCreatedAt;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return Incident
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set problemType
     *
     * @param string $problemType
     *
     * @return Incident
     */
    public function setProblemType($problemType)
    {
        $this->problemType = $problemType;

        return $this;
    }

    /**
     * Get problemType
     *
     * @return string
     */
    public function getProblemType()
    {
        return $this->problemType;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Incident
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
     * Set description
     *
     * @param string $description
     *
     * @return Incident
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isClosed
     *
     * @param boolean $isClosed
     *
     * @return Incident
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * Get isClosed
     *
     * @return bool
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @return string
     */
    public function getImpacts()
    {
        return $this->impacts;
    }

    /**
     * @param string $impacts
     */
    public function setImpacts($impacts)
    {
        $this->impacts = $impacts;
    }

    /**
     * @return string
     */
    public function getSiteCanonical()
    {
        return $this->siteCanonical;
    }

    /**
     * @param string $siteCanonical
     */
    public function setSiteCanonical($siteCanonical)
    {
        $this->siteCanonical = $siteCanonical;
    }



}

