<?php
// src/AppBundle/Entity/User.php

namespace PGX\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"proviseur" = "Proviseur", "surveillant" = "Surveillant", "professeur"="Professeur","eleve"="Eleve"})
 */
abstract class User extends BaseUser
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
     * @Assert\NotBlank(message="Entrer votre nom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="Le nom est trop court.",
     *     maxMessage="Le nom est trop grand.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Entrer votre prénom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="Le prénom est trop court.",
     *     maxMessage="Le prénom est trop grand.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $prenom;

    /**
     * @ORM\Column(type="date")
     *
     * @Assert\NotBlank(message="Entrer votre date de naissance.", groups={"Registration", "Profile"})
     *
     */
    protected $datenaissance;

    /**
     * @ORM\Column(type="string", length=1000)
     *
     * @Assert\NotBlank(message="Entrer votre adresse.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=255,
     *     minMessage="l'adrese est trop court.",
     *     maxMessage="L'adresse est trop grand.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $adresse;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="Entrer votre numéro de téléphone mobile.", groups={"Registration", "Profile"})
     *
     */
    protected $telephonemobile;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="Entrer votre numéro de téléphone domicile.", groups={"Registration", "Profile"})
     *
     */
    protected $telephonedomicile;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank(message="Entrer votre numéro de genre.", groups={"Registration", "Profile"})
     *
     */
    protected $genre;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Entrer votre numéro de carte d'identité.", groups={"Registration", "Profile"})
     *
     */
    protected $cin;

    /**
     * @ORM\Column(type="string", length=1000)
     *
     * @Assert\NotBlank(message="Entrer l'url de votre image.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=1,
     *     max=1000,
     *     minMessage="l'image est trop court.",
     *     maxMessage="L'image est trop grand.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $image;

    /**
     * @ORM\Column(type="text")
     *@Assert\Length(
     *     max=1000,
     *     maxMessage="Votre texte ne doit pas faire plus de 1000 caractère.",
     *     groups={"Registration", "Profile"}
     * )
     *
     */
    protected $citation;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotBlank(message="Activé ou désactivé.", groups={"Registration", "Profile"})
     *
     */
    protected $statut;

    /**
     * @ORM\ManyToMany(targetEntity="PGX\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;


    /**
     * @ORM\Column(type="integer", length=6, options={"default":0})
     */
    protected $loginCount = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $firstLogin;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Set loginCount
     *
     * @param integer $loginCount
     * @return User
     */
    public function setLoginCount($loginCount)
    {
        $this->loginCount = $loginCount;
    
        return $this;
    }

    /**
     * Get loginCount
     *
     * @return integer 
     */
    public function getLoginCount()
    {
        return $this->loginCount;
    }

    /**
     * Set firstLogin
     *
     * @param \DateTime $firstLogin
     * @return User
     */
    public function setFirstLogin($firstLogin)
    {
        $this->firstLogin = $firstLogin;
    
        return $this;
    }

    /**
     * Get firstLogin
     *
     * @return \DateTime 
     */
    public function getFirstLogin()
    {
        return $this->firstLogin;
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return User
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     *
     * @return User
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set telephonemobile
     *
     * @param integer $telephonemobile
     *
     * @return User
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
     * Set telephonedomicile
     *
     * @param integer $telephonedomicile
     *
     * @return User
     */
    public function setTelephonedomicile($telephonedomicile)
    {
        $this->telephonedomicile = $telephonedomicile;

        return $this;
    }

    /**
     * Get telephonedomicile
     *
     * @return integer
     */
    public function getTelephonedomicile()
    {
        return $this->telephonedomicile;
    }

    /**
     * Set genre
     *
     * @param boolean $genre
     *
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return boolean
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return User
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
     * Set statut
     *
     * @param boolean $statut
     *
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set citation
     *
     * @param string $citation
     *
     * @return User
     */
    public function setCitation($citation)
    {
        $this->citation = $citation;

        return $this;
    }

    /**
     * Get citation
     *
     * @return string
     */
    public function getCitation()
    {
        return $this->citation;
    }
}
