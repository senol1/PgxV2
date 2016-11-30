<?php

namespace PGX\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="professeur")
 * @UniqueEntity(fields = "username", targetClass = "PGX\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "PGX\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Professeur extends User
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
     */
    protected $echelle;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    protected $echelon;

    public function __construct()
    {
        parent::__construct();
        $this->addRole("ROLE_PROFESSEUR");
    }

    /**
     * Set echelle
     *
     * @param string $echelle
     *
     * @return Professeur
     */
    public function setEchelle($echelle)
    {
        $this->echelle = $echelle;

        return $this;
    }

    /**
     * Get echelle
     *
     * @return string
     */
    public function getEchelle()
    {
        return $this->echelle;
    }

    /**
     * Set echelon
     *
     * @param string $echelon
     *
     * @return Professeur
     */
    public function setEchelon($echelon)
    {
        $this->echelon = $echelon;

        return $this;
    }

    /**
     * Get echelon
     *
     * @return string
     */
    public function getEchelon()
    {
        return $this->echelon;
    }
}
