<?php

namespace PGX\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abscence
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Abscence
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
     * @ORM\Column(name="datedebut", type="datetime")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime")
     */
    private $datefin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="justifiee", type="boolean")
     */
    private $justifiee;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="string", length=1000)
     */
    private $remarque;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\UserBundle\Entity\Eleve")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\GestionBundle\Entity\SeanceCours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $seancecours;


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
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Abscence
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Abscence
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set justifiee
     *
     * @param boolean $justifiee
     *
     * @return Abscence
     */
    public function setJustifiee($justifiee)
    {
        $this->justifiee = $justifiee;

        return $this;
    }

    /**
     * Get justifiee
     *
     * @return boolean
     */
    public function getJustifiee()
    {
        return $this->justifiee;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     *
     * @return Abscence
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set eleve
     *
     * @param \PGX\UserBundle\Entity\Eleve $eleve
     *
     * @return Abscence
     */
    public function setEleve(\PGX\UserBundle\Entity\Eleve $eleve=null)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \PGX\UserBundle\Entity\Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * Set seancecours
     *
     * @param \PGX\GestionBundle\Entity\SeanceCours $seancecours
     *
     * @return Abscence
     */
    public function setSeancecours(\PGX\GestionBundle\Entity\SeanceCours $seancecours=null)
    {
        $this->seancecours = $seancecours;

        return $this;
    }

    /**
     * Get seancecours
     *
     * @return \PGX\GestionBundle\Entity\SeanceCours
     */
    public function getSeancecours()
    {
        return $this->seancecours;
    }
}
