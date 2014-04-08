<?php

namespace VA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stars
 *
 * @ORM\Table(name="stars", indexes={@ORM\Index(name="fk_stars_systems1_idx", columns={"systems_id"})})
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
     *   @ORM\JoinColumn(name="systems_id", referencedColumnName="id")
     * })
     */
    private $systems;



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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set systems
     *
     * @param \VA\CoreBundle\Entity\Systems $systems
     * @return Stars
     */
    public function setSystems(\VA\CoreBundle\Entity\Systems $systems = null)
    {
        $this->systems = $systems;

        return $this;
    }

    /**
     * Get systems
     *
     * @return \VA\CoreBundle\Entity\Systems 
     */
    public function getSystems()
    {
        return $this->systems;
    }
}
