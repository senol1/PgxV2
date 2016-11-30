<?php

namespace PGX\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseigne
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Enseigne
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
     * @ORM\ManyToOne(targetEntity="PGX\UserBundle\Entity\Professeur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $professeur;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\GestionBundle\Entity\Matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\GestionBundle\Entity\Classe")
     * @ORM\ManyToOne(targetEntity="PGX\GestionBundle\Entity\Classe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;


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
     * Set professeur
     *
     * @param \PGX\UserBundle\Entity\Professeur $professeur
     *
     * @return Enseigne
     */
    public function setProfesseur(\PGX\UserBundle\Entity\Professeur $professeur=null)
    {
        $this->professeur = $professeur;

        return $this;
    }

    /**
     * Get professeur
     *
     * @return \PGX\UserBundle\Entity\Professeur
     */
    public function getProfesseur()
    {
        return $this->professeur;
    }

    /**
     * Set matiere
     *
     * @param \PGX\GestionBundle\Entity\Matiere $matiere
     *
     * @return Enseigne
     */
    public function setMatiere(\PGX\GestionBundle\Entity\Matiere $matiere=null)
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

    /**
     * Set classe
     *
     * @param \PGX\GestionBundle\Entity\Classe $classe
     *
     * @return Enseigne
     */
    public function setClasse(\PGX\GestionBundle\Entity\Classe $classe=null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \PGX\GestionBundle\Entity\Classe
     */
    public function getClasse()
    {
        return $this->classe;
    }
}
