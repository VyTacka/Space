<?php

namespace VA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planets
 *
 * @ORM\Table(name="planets", indexes={@ORM\Index(name="fk_planets_systems1_idx", columns={"system_id"})})
 * @ORM\Entity
 */
class Planets
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
     * @ORM\Column(name="volume", type="integer", nullable=true)
     */
    private $volume;

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
     * @ORM\Column(name="shortest_distance", type="integer", nullable=true)
     */
    private $shortestDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="longest_distance", type="integer", nullable=true)
     */
    private $longestDistance;

    /**
     * @var integer
     *
     * @ORM\Column(name="rotation_period", type="integer", nullable=true)
     */
    private $rotationPeriod;

    /**
     * @var integer
     *
     * @ORM\Column(name="revolution_period", type="integer", nullable=true)
     */
    private $revolutionPeriod;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \VA\CoreBundle\Entity\Systems
     *
     * @ORM\ManyToOne(targetEntity="VA\CoreBundle\Entity\Systems")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="system_id", referencedColumnName="id")
     * })
     */
    private $system;



    /**
     * Set name
     *
     * @param string $name
     * @return Planets
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
     * @return Planets
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
     * @return Planets
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
     * @return Planets
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
     * @return Planets
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
     * Set volume
     *
     * @param integer $volume
     * @return Planets
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer 
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set mass
     *
     * @param integer $mass
     * @return Planets
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
     * @return Planets
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
     * Set shortestDistance
     *
     * @param integer $shortestDistance
     * @return Planets
     */
    public function setShortestDistance($shortestDistance)
    {
        $this->shortestDistance = $shortestDistance;

        return $this;
    }

    /**
     * Get shortestDistance
     *
     * @return integer 
     */
    public function getShortestDistance()
    {
        return $this->shortestDistance;
    }

    /**
     * Set longestDistance
     *
     * @param integer $longestDistance
     * @return Planets
     */
    public function setLongestDistance($longestDistance)
    {
        $this->longestDistance = $longestDistance;

        return $this;
    }

    /**
     * Get longestDistance
     *
     * @return integer 
     */
    public function getLongestDistance()
    {
        return $this->longestDistance;
    }

    /**
     * Set rotationPeriod
     *
     * @param integer $rotationPeriod
     * @return Planets
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
     * Set revolutionPeriod
     *
     * @param integer $revolutionPeriod
     * @return Planets
     */
    public function setRevolutionPeriod($revolutionPeriod)
    {
        $this->revolutionPeriod = $revolutionPeriod;

        return $this;
    }

    /**
     * Get revolutionPeriod
     *
     * @return integer 
     */
    public function getRevolutionPeriod()
    {
        return $this->revolutionPeriod;
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

    /**
     * Set system
     *
     * @param \VA\CoreBundle\Entity\Systems $system
     * @return Planets
     */
    public function setSystem(\VA\CoreBundle\Entity\Systems $system = null)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Get system
     *
     * @return \VA\CoreBundle\Entity\Systems 
     */
    public function getSystem()
    {
        return $this->system;
    }
}
