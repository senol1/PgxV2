<?php

namespace PGX\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Etablissement
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="acronyme", type="string", length=255)
     */
    private $acronyme;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurtextenom", type="string", length=255)
     */
    private $couleurtextenom;

    /**
     * @var string
     *
     * @ORM\Column(name="noautorisation", type="string", length=255)
     */
    private $noautorisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer")
     */
    private $capacite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="adressecomplementaire", type="string", length=255)
     */
    private $adressecomplementaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephonemobile", type="integer")
     */
    private $telephonemobile;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephonefixe", type="integer")
     */
    private $telephonefixe;

    /**
     * @var integer
     *
     * @ORM\Column(name="fax", type="integer")
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="autretelephone", type="integer")
     */
    private $autretelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string")
     */
    private $image;

    /**
     * @var boolean
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Etablissement
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
     * Set noautorisation
     *
     * @param string $noautorisation
     *
     * @return Etablissement
     */
    public function setNoautorisation($noautorisation)
    {
        $this->noautorisation = $noautorisation;

        return $this;
    }

    /**
     * Get noautorisation
     *
     * @return string
     */
    public function getNoautorisation()
    {
        return $this->noautorisation;
    }

    /**
     * Set capacite
     *
     * @param integer $capacite
     *
     * @return Etablissement
     */
    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;

        return $this;
    }

    /**
     * Get capacite
     *
     * @return integer
     */
    public function getCapacite()
    {
        return $this->capacite;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etablissement
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
     * Set adressecomplementaire
     *
     * @param string $adressecomplementaire
     *
     * @return Etablissement
     */
    public function setAdressecomplementaire($adressecomplementaire)
    {
        $this->adressecomplementaire = $adressecomplementaire;

        return $this;
    }

    /**
     * Get adressecomplementaire
     *
     * @return string
     */
    public function getAdressecomplementaire()
    {
        return $this->adressecomplementaire;
    }

    /**
     * Set telephonemobile
     *
     * @param integer $telephonemobile
     *
     * @return Etablissement
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
     * Set telephonefixe
     *
     * @param integer $telephonefixe
     *
     * @return Etablissement
     */
    public function setTelephonefixe($telephonefixe)
    {
        $this->telephonefixe = $telephonefixe;

        return $this;
    }

    /**
     * Get telephonefixe
     *
     * @return integer
     */
    public function getTelephonefixe()
    {
        return $this->telephonefixe;
    }

    /**
     * Set fax
     *
     * @param integer $fax
     *
     * @return Etablissement
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return integer
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set autretelephone
     *
     * @param integer $autretelephone
     *
     * @return Etablissement
     */
    public function setAutretelephone($autretelephone)
    {
        $this->autretelephone = $autretelephone;

        return $this;
    }

    /**
     * Get autretelephone
     *
     * @return integer
     */
    public function getAutretelephone()
    {
        return $this->autretelephone;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Etablissement
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
     * Set image
     *
     * @param string $image
     *
     * @return Etablissement
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
     * Set couleurtextenom
     *
     * @param string $couleurtextenom
     *
     * @return Etablissement
     */
    public function setCouleurtextenom($couleurtextenom)
    {
        $this->couleurtextenom = $couleurtextenom;

        return $this;
    }

    /**
     * Get couleurtextenom
     *
     * @return string
     */
    public function getCouleurtextenom()
    {
        return $this->couleurtextenom;
    }

    /**
     * Set acronyme
     *
     * @param string $acronyme
     *
     * @return Etablissement
     */
    public function setAcronyme($acronyme)
    {
        $this->acronyme = $acronyme;

        return $this;
    }

    /**
     * Get acronyme
     *
     * @return string
     */
    public function getAcronyme()
    {
        return $this->acronyme;
    }
}
