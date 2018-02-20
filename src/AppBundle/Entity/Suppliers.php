<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suppliers
 *
 * @ORM\Table(name="suppliers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SuppliersRepository")
 */
class Suppliers
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
     * @var bool
     *
     * @ORM\Column(name="IsImporter", type="boolean")
     */
    private $isImporter;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Parts", inversedBy="" )
     * @ORM\JoinColumn(name="id")
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
     * Set name
     *
     * @param string $name
     *
     * @return Suppliers
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
     * Set isImporter
     *
     * @param boolean $isImporter
     *
     * @return Suppliers
     */
    public function setIsImporter($isImporter)
    {
        $this->isImporter = $isImporter;

        return $this;
    }

    /**
     * Get isImporter
     *
     * @return bool
     */
    public function getIsImporter()
    {
        return $this->isImporter;
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
}

