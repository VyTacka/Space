<?php

namespace VA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stars
 *
 * @ORM\Table(name="stars")
 * @ORM\Entity
 */
class Stars
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="img_url", type="string", length=255, nullable=true)
     */
    private $imgUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="temperature", type="integer", nullable=true)
     */
    private $temperature;

    /**
     * @var integer
     *
     * @ORM\Column(name="diameter", type="integer", nullable=true)
     */
    private $diameter;

    /**
     * @var integer
     *
     * @ORM\Column(name="mass", type="integer", nullable=true)
     */
    private $mass;

    /**
     * @var integer
     *
     * @ORM\Column(name="density", type="integer", nullable=true)
     */
    private $density;

    /**
     * @var integer
     *
     * @ORM\Column(name="rotation_period", type="integer", nullable=true)
     */
    private $rotationPeriod;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set name
     *
     * @param string $name
     * @return Stars
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
     * Set description
     *
     * @param string $description
     * @return Stars
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
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return Stars
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string 
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set temperature
     *
     * @param integer $temperature
     * @return Stars
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature
     *
     * @return integer 
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set diameter
     *
     * @param integer $diameter
     * @return Stars
     */
    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;

        return $this;
    }

    /**
     * Get diameter
     *
     * @return integer 
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * Set mass
     *
     * @param integer $mass
     * @return Stars
     */
    public function setMass($mass)
    {
        $this->mass = $mass;

        return $this;
    }

    /**
     * Get mass
     *
     * @return integer 
     */
    public function getMass()
    {
        return $this->mass;
    }

    /**
     * Set density
     *
     * @param integer $density
     * @return Stars
     */
    public function setDensity($density)
    {
        $this->density = $density;

        return $this;
    }

    /**
     * Get density
     *
     * @return integer 
     */
    public function getDensity()
    {
        return $this->density;
    }

    /**
     * Set rotationPeriod
     *
     * @param integer $rotationPeriod
     * @return Stars
     */
    public function setRotationPeriod($rotationPeriod)
    {
        $this->rotationPeriod = $rotationPeriod;

        return $this;
    }

    /**
     * Get rotationPeriod
     *
     * @return integer 
     */
    public function getRotationPeriod()
    {
        return $this->rotationPeriod;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
