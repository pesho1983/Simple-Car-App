<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cars
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarsRepository")
 */
class Cars
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
     * @ORM\Column(name="Make", type="string", length=255)
     */
    private $make;

    /**
     * @var string
     *
     * @ORM\Column(name="Model", type="string", length=255)
     */
    private $model;

    /**
     * @var int
     * @ORM\Column(name="TravelledDistance", type="integer")
     */
    private $travelledDistance;
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Parts", mappedBy="cars")
     * @ORM\JoinTable(name="part_cars")
     */
    private $parts;

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
     * Set make
     *
     * @param string $make
     *
     * @return Cars
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Cars
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set travelledDistance
     *
     * @param integer $travelledDistance
     *
     * @return Cars
     */
    public function setTravelledDistance($travelledDistance)
    {
        $this->travelledDistance = $travelledDistance;

        return $this;
    }

    /**
     * Get travelledDistance
     *
     * @return int
     */
    public function getTravelledDistance()
    {
        return $this->travelledDistance;
    }

    /**
     * @return mixed
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @param mixed $parts
     */
    public function setParts($parts)
    {
        $this->parts = $parts;

    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getMake()." ".$this->getModel();
    }

}

