<?php

namespace PGX\GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Note
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
     * @ORM\Column(name="note", type="decimal")
     */
    private $note;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="appreciation", type="string", length=255)
     */
    private $appreciation;

    /**
     * @ORM\ManyToOne(targetEntity="PGX\UserBundle\Entity\Eleve")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

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
     * Set note
     *
     * @param string $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Note
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set appreciation
     *
     * @param string $appreciation
     *
     * @return Note
     */
    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;

        return $this;
    }

    /**
     * Get appreciation
     *
     * @return string
     */
    public function getAppreciation()
    {
        return $this->appreciation;
    }

    /**
     * Set eleve
     *
     * @param \PGX\UserBundle\Entity\Eleve $eleve
     *
     * @return Note
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
     * Set matiere
     *
     * @param \PGX\GestionBundle\Entity\Matiere $matiere
     *
     * @return Note
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
}
