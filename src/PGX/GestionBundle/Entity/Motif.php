<?php

namespace PGX\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motif
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Motif
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255)
     */
    private $motif;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=1000)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\GestionBundle\Entity\Abscence")
     * @ORM\JoinColumn(nullable=false)
     */
    private $absence;

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
     * Set motif
     *
     * @param string $motif
     *
     * @return Motif
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Motif
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set absence
     *
     * @param \PGX\GestionBundle\Entity\Abscence $absence
     *
     * @return Motif
     */
    public function setAbsence(\PGX\GestionBundle\Entity\Abscence $absence=null)
    {
        $this->absence = $absence;

        return $this;
    }

    /**
     * Get absence
     *
     * @return \PGX\GestionBundle\Entity\Abscence
     */
    public function getAbsence()
    {
        return $this->absence;
    }
}
