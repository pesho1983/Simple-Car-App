<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sales
 *
 * @ORM\Table(name="sales")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalesRepository")
 */
class Sales
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
     * @var int
     *
     * @ORM\Column(name="Discount", type="integer")
     */
    private $discount;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Cars")
     * @ORM\JoinColumn(name="Car_Id",referencedColumnName="id")
     */
    private $cars;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customers", inversedBy="sales")
     * @ORM\JoinColumn(name="Customer_Id",referencedColumnName="id")
     */
    private $customers;

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
     * @return mixed
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param mixed $customers
     */
    public function setCustomers($customers)
    {
        $this->customers = $customers;
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
     * Set discount
     *
     * @param integer $discount
     *
     * @return Sales
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}

