<?php

namespace PGX\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="eleve")
 * @UniqueEntity(fields = "username", targetClass = "PGX\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "PGX\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Eleve extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Entrer votre matricule.", groups={"Registration", "Profile"})
     *
     */
    protected $matricule;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank(message="Boursier ou pas.", groups={"Registration", "Profile"})
     *
     */
    protected $boursier;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank(message="Viré ou pas.", groups={"Registration", "Profile"})
     *
     */
    protected $abandon;

    /**
     * @ORM\ManyToMany(targetEntity="PGX\GestionBundle\Entity\Classe",cascade={"persist", "merge"})
     */
    private $classes;

    public function __construct()
    {
        parent::__construct();
        $this->addRole("ROLE_ELEVE");
    }


    /**
     * Set matricule
     *
     * @param integer $matricule
     *
     * @return Eleve
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return integer
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set boursier
     *
     * @param boolean $boursier
     *
     * @return Eleve
     */
    public function setBoursier($boursier)
    {
        $this->boursier = $boursier;

        return $this;
    }

    /**
     * Get boursier
     *
     * @return boolean
     */
    public function getBoursier()
    {
        return $this->boursier;
    }

    /**
     * Set abandon
     *
     * @param boolean $abandon
     *
     * @return Eleve
     */
    public function setAbandon($abandon)
    {
        $this->abandon = $abandon;

        return $this;
    }

    /**
     * Get abandon
     *
     * @return boolean
     */
    public function getAbandon()
    {
        return $this->abandon;
    }

    /**
     * Add class
     *
     * @param \PGX\GestionBundle\Entity\Classe $class
     *
     * @return Eleve
     */
    public function addClass(\PGX\GestionBundle\Entity\Classe $class=null)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \PGX\GestionBundle\Entity\Classe $class
     */
    public function removeClass(\PGX\GestionBundle\Entity\Classe $class)
    {
        $this->classes->removeElement($class);
    }

    /**
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }
}
