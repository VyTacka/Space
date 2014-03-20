<?php

namespace VA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Satellites
 *
 * @ORM\Table(name="satellites", indexes={@ORM\Index(name="fk_moons_planets1_idx", columns={"planet_id"})})
 * @ORM\Entity
 */
class Satellites
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
     * @ORM\Column(name="distance", type="integer", nullable=true)
     */
    private $distance;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \VA\CoreBundle\Entity\Planets
     *
     * @ORM\ManyToOne(targetEntity="VA\CoreBundle\Entity\Planets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="planet_id", referencedColumnName="id")
     * })
     */
    private $planet;



    /**
     * Set name
     *
     * @param string $name
     * @return Satellites
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
     * @return Satellites
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
     * @return Satellites
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
     * Set diameter
     *
     * @param integer $diameter
     * @return Satellites
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
     * @return Satellites
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
     * @return Satellites
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
     * @return Satellites
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
     * Set distance
     *
     * @param integer $distance
     * @return Satellites
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer 
     */
    public function getDistance()
    {
        return $this->distance;
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
     * Set planet
     *
     * @param \VA\CoreBundle\Entity\Planets $planet
     * @return Satellites
     */
    public function setPlanet(\VA\CoreBundle\Entity\Planets $planet = null)
    {
        $this->planet = $planet;

        return $this;
    }

    /**
     * Get planet
     *
     * @return \VA\CoreBundle\Entity\Planets 
     */
    public function getPlanet()
    {
        return $this->planet;
    }
}
