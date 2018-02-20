<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parts
 *
 * @ORM\Table(name="parts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartsRepository")
 */
class Parts
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="Price", type="float")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="Quantity", type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cars", inversedBy="parts")
     * @ORM\JoinTable(name="part_cars")
     */
    private $cars;

    /**
     * @return mixed
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param mixed $cars
     */
    public function setCars($cars)
    {
        $this->cars = $cars;
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Parts
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Parts
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function __toString()
    {
        return $this->getName();
    }


}

