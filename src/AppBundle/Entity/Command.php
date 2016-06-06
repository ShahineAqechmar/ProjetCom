<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandRepository")
 */
class Command
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
     * @ORM\Column(name="Creation_Date", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Delivered_Date", type="datetime")
     */
    private $deliveredDate;

    /**
     * @var string
     *
     * @ORM\Column(name="Total_Price", type="decimal", precision=10, scale=2)
     */
    private $totalPrice;

    /**
     * @var Command_Line
     *
     * -- Liaison bidirectionelle entre Command et Command_Line
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Command_Line", mappedBy="command")
     *
     *
     */
    private $Command_Line;

    /**
     * @var User
     *
     * -- Liaison bidirectionelle entre Command et User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="command")
     *
     *
     */
    private $User;

    /**
     * @var Time_Slot
     *
     * -- Liaison bidirectionelle entre Command et Time_Slot
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Time_Slot", inversedBy="command")
     *
     *
     */
    private $Time_slot;

    /**
     * @var Command_State
     *
     * -- Liaison bidirectionelle entre Command et Command_State
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Command_State", inversedBy="command")
     *
     *
     */
    private $Command_State;

    /**
     * @var Delivery_Address
     *
     * -- Liaison bidirectionelle entre Command et Delivery_Address
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Delivery_Address", inversedBy="command")
     *
     *
     */
    private $Delivery_Address;
    

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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Command
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set deliveredDate
     *
     * @param \DateTime $deliveredDate
     *
     * @return Command
     */
    public function setDeliveredDate($deliveredDate)
    {
        $this->deliveredDate = $deliveredDate;

        return $this;
    }

    /**
     * Get deliveredDate
     *
     * @return \DateTime
     */
    public function getDeliveredDate()
    {
        return $this->deliveredDate;
    }

    /**
     * Set totalPrice
     *
     * @param string $totalPrice
     *
     * @return Command
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Command_Line = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creationDate = new \DateTimeZone('Now');
    }

    /**
     * Add commandLine
     *
     * @param \AppBundle\Entity\Command_Line $commandLine
     *
     * @return Command
     */
    public function addCommandLine(\AppBundle\Entity\Command_Line $commandLine)
    {
        $this->Command_Line[] = $commandLine;

        return $this;
    }

    /**
     * Remove commandLine
     *
     * @param \AppBundle\Entity\Command_Line $commandLine
     */
    public function removeCommandLine(\AppBundle\Entity\Command_Line $commandLine)
    {
        $this->Command_Line->removeElement($commandLine);
    }

    /**
     * Get commandLine
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandLine()
    {
        return $this->Command_Line;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Command
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * Set timeSlot
     *
     * @param \AppBundle\Entity\Time_Slot $timeSlot
     *
     * @return Command
     */
    public function setTimeSlot(\AppBundle\Entity\Time_Slot $timeSlot = null)
    {
        $this->Time_slot = $timeSlot;

        return $this;
    }

    /**
     * Get timeSlot
     *
     * @return \AppBundle\Entity\Time_Slot
     */
    public function getTimeSlot()
    {
        return $this->Time_slot;
    }

    /**
     * Set commandState
     *
     * @param \AppBundle\Entity\Command_State $commandState
     *
     * @return Command
     */
    public function setCommandState(\AppBundle\Entity\Command_State $commandState = null)
    {
        $this->Command_State = $commandState;

        return $this;
    }

    /**
     * Get commandState
     *
     * @return \AppBundle\Entity\Command_State
     */
    public function getCommandState()
    {
        return $this->Command_State;
    }

    /**
     * Set deliveryAddress
     *
     * @param \AppBundle\Entity\Delivery_Address $deliveryAddress
     *
     * @return Command
     */
    public function setDeliveryAddress(\AppBundle\Entity\Delivery_Address $deliveryAddress = null)
    {
        $this->Delivery_Address = $deliveryAddress;

        return $this;
    }

    /**
     * Get deliveryAddress
     *
     * @return \AppBundle\Entity\Delivery_Address
     */
    public function getDeliveryAddress()
    {
        return $this->Delivery_Address;
    }
}
