<?php

namespace PGX\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parent
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Parents
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255)
     */
    private $fonction;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephonemobile", type="integer")
     */
    private $telephonemobile;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\UserBundle\Entity\Eleve")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;


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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Parent
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Parent
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     *
     * @return Parent
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set telephonemobile
     *
     * @param integer $telephonemobile
     *
     * @return Parent
     */
    public function setTelephonemobile($telephonemobile)
    {
        $this->telephonemobile = $telephonemobile;

        return $this;
    }

    /**
     * Get telephonemobile
     *
     * @return integer
     */
    public function getTelephonemobile()
    {
        return $this->telephonemobile;
    }

    /**
     * Set eleve
     *
     * @param \PGX\UserBundle\Entity\Eleve $eleve
     *
     * @return Parents
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
}
