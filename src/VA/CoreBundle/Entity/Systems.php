<?php

namespace VA\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Systems
 *
 * @ORM\Table(name="systems", indexes={@ORM\Index(name="fk_systems_stars_idx", columns={"star_id"})})
 * @ORM\Entity
 */
class Systems
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
     * @var \VA\CoreBundle\Entity\Stars
     *
     * @ORM\ManyToOne(targetEntity="VA\CoreBundle\Entity\Stars")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="star_id", referencedColumnName="id")
     * })
     */
    private $star;



    /**
     * Set name
     *
     * @param string $name
     * @return Systems
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
     * @return Systems
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
     * @return Systems
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
     * Set star
     *
     * @param \VA\CoreBundle\Entity\Stars $star
     * @return Systems
     */
    public function setStar(\VA\CoreBundle\Entity\Stars $star = null)
    {
        $this->star = $star;

        return $this;
    }

    /**
     * Get star
     *
     * @return \VA\CoreBundle\Entity\Stars 
     */
    public function getStar()
    {
        return $this->star;
    }
}
