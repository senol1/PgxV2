<?php

namespace PGX\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeanceCours
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class SeanceCours
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time")
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="typeSeance", type="string", length=255)
     */
    private $typeSeance;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\GestionBundle\Entity\Matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;


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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return SeanceCours
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return SeanceCours
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set typeSeance
     *
     * @param string $typeSeance
     *
     * @return SeanceCours
     */
    public function setTypeSeance($typeSeance)
    {
        $this->typeSeance = $typeSeance;

        return $this;
    }

    /**
     * Get typeSeance
     *
     * @return string
     */
    public function getTypeSeance()
    {
        return $this->typeSeance;
    }

    /**
     * Set matiere
     *
     * @param \PGX\GestionBundle\Entity\Matiere $matiere
     *
     * @return SeanceCours
     */
    public function setMatiere(\PGX\GestionBundle\Entity\Matiere $matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return \PGX\GestionBundle\Entity\Matiere
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
}
