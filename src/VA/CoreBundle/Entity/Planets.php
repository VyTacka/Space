<?php

namespace VA\CoreBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Planets
 *
 * @ORM\Table(name="planets", indexes={@ORM\Index(name="fk_planets_systems1_idx", columns={"system_id"})})
 * @ORM\Entity(repositoryClass="VA\CoreBundle\Entity\PlanetsRepository")
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
     * @ORM\Column(name="`order`", type="integer")
     */
    private $order;

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
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="VA\CoreBundle\Entity\Satellites", mappedBy="planet")
     */
    protected $satellites;

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

    /**
     * @param \Doctrine\Common\Collections\Collection $satellites
     */
    public function setSatellites($satellites)
    {
        $this->satellites = $satellites;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSatellites()
    {
        return $this->satellites;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->satellites = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add satellites
     *
     * @param \VA\CoreBundle\Entity\Satellites $satellites
     * @return Planets
     */
    public function addSatellite(\VA\CoreBundle\Entity\Satellites $satellites)
    {
        $this->satellites[] = $satellites;

        return $this;
    }

    /**
     * Remove satellites
     *
     * @param \VA\CoreBundle\Entity\Satellites $satellites
     */
    public function removeSatellite(\VA\CoreBundle\Entity\Satellites $satellites)
    {
        $this->satellites->removeElement($satellites);
    }

    /**
     * Set order
     *
     * @param integer $order
     * @return Planets
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer 
     */
    public function getOrder()
    {
        return $this->order;
    }
}
