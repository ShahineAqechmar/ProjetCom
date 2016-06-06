<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Time_Slot
 *
 * @ORM\Table(name="time__slot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Time_SlotRepository")
 */
class Time_Slot
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
     * @var \DateTime
     *
     * @ORM\Column(name="Start", type="time")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="End", type="time")
     */
    private $end;

    /**
     * @var Command
     *
     *
     * -- Liaison bidirectionelle entre Time_Slot et Command
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Command",mappedBy="time_slot")
     *
     */
    private $Command;


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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Time_Slot
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Time_Slot
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Command = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add command
     *
     * @param \AppBundle\Entity\Command $command
     *
     * @return Time_Slot
     */
    public function addCommand(\AppBundle\Entity\Command $command)
    {
        $this->Command[] = $command;

        return $this;
    }

    /**
     * Remove command
     *
     * @param \AppBundle\Entity\Command $command
     */
    public function removeCommand(\AppBundle\Entity\Command $command)
    {
        $this->Command->removeElement($command);
    }

    /**
     * Get command
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommand()
    {
        return $this->Command;
    }
}
