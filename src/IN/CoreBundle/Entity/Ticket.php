<?php

namespace IN\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="IN\CoreBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @ORM\Column(name="code_ticket", type="string", length=255, nullable=true)
     */
    private $codeTicket;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne (targetEntity="IN\UserBundle\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\ManyToOne (targetEntity="IN\CoreBundle\Entity\Site")
     * @ORM\JoinColumn(name="code_site", referencedColumnName="code_site")
     */
    private $site;

    /**
     * @ORM\ManyToOne (targetEntity="IN\UserBundle\Entity\User")
     */
    private $sendTo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="datetime",nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="priorite", type="integer", nullable=true)
     */
    private $priorite;

    /**
     * @var string
     *
     * @ORM\Column(name="is_validated", type="boolean")
     */
    private $isValidate;


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
     * Set codeTicket
     *
     * @param string $codeTicket
     *
     * @return Ticket
     */
    public function setCodeTicket($codeTicket)
    {
        $this->codeTicket = $codeTicket;

        return $this;
    }

    /**
     * Get codeTicket
     *
     * @return string
     */
    public function getCodeTicket()
    {
        return $this->codeTicket;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Ticket
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return Ticket
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
     * Set sendTo
     *
     * @param string $sendTo
     *
     * @return Ticket
     */
    public function setSendTo($sendTo)
    {
        $this->sendTo = $sendTo;

        return $this;
    }

    /**
     * Get sendTo
     *
     * @return string
     */
    public function getSendTo()
    {
        return $this->sendTo;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Ticket
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Ticket
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Ticket
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function getPriorite()
    {
        return $this->priorite;
    }

    /**
     * @param string $priorite
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;
    }




}

