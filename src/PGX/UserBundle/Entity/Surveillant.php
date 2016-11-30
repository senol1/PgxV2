<?php

namespace PGX\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="surveillant")
 * @UniqueEntity(fields = "username", targetClass = "PGX\UserBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "PGX\UserBundle\Entity\User", message="fos_user.email.already_used")
 */
class Surveillant extends User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        $this->addRole("ROLE_SURVEILLANT");
    }
}