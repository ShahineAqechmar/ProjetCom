<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command_Line
 *
 * @ORM\Table(name="command__line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Command_LineRepository")
 */
class Command_Line
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
     * @ORM\Column(name="Product_Quantity", type="decimal", precision=10, scale=0)
     */
    private $productQuantity;

    /**
     * @var string
     *
     * @ORM\Column(name="Line_Price", type="decimal", precision=10, scale=2)
     */
    private $linePrice;

    /**
     * @var Product
     *
     * -- Liaison bidirectionelle entre CommandLine et Product
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Product",inversedBy="command_line")
     *
     */
    private $Product;

    /**
     * @var Command
     *
     * -- Liaison bidirectionelle entre CommandLine et Commande
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Command",inversedBy="command_line")
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
     * Set productQuantity
     *
     * @param string $productQuantity
     *
     * @return Command_Line
     */
    public function setProductQuantity($productQuantity)
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }

    /**
     * Get productQuantity
     *
     * @return string
     */
    public function getProductQuantity()
    {
        return $this->productQuantity;
    }

    /**
     * Set linePrice
     *
     * @param string $linePrice
     *
     * @return Command_Line
     */
    public function setLinePrice($linePrice)
    {
        $this->linePrice = $linePrice;

        return $this;
    }

    /**
     * Get linePrice
     *
     * @return string
     */
    public function getLinePrice()
    {
        return $this->linePrice;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Command_Line
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->Product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->Product;
    }

    /**
     * Set command
     *
     * @param \AppBundle\Entity\Command $command
     *
     * @return Command_Line
     */
    public function setCommand(\AppBundle\Entity\Command $command = null)
    {
        $this->Command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return \AppBundle\Entity\Command
     */
    public function getCommand()
    {
        return $this->Command;
    }
}
