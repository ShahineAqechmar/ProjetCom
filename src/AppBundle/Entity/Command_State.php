<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command_State
 *
 * @ORM\Table(name="command__state")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Command_StateRepository")
 */
class Command_State
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
     * @ORM\Column(name="State_Name", type="string", length=255, unique=true)
     */
    private $stateName;

    /**
     * @var string
     *
     * @ORM\Column(name="State_Description", type="string", length=255)
     */
    private $stateDescription;

    /**
     * @var Command
     *
     *
     * -- Liaison bidirectionelle entre Command_State et Command
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Command",mappedBy="command_state")
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
     * Set stateName
     *
     * @param string $stateName
     *
     * @return Command_State
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }

    /**
     * Get stateName
     *
     * @return string
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * Set stateDescription
     *
     * @param string $stateDescription
     *
     * @return Command_State
     */
    public function setStateDescription($stateDescription)
    {
        $this->stateDescription = $stateDescription;

        return $this;
    }

    /**
     * Get stateDescription
     *
     * @return string
     */
    public function getStateDescription()
    {
        return $this->stateDescription;
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
     * @return Command_State
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
