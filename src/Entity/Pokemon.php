<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Pokemon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime", length=255)
     */
    private $dateCapture;

    /**
     * @ORM\Column(type="boolean", length=255)
     */
    private $sexe;

    /**
    * @ORM\ManyToMany(targetEntity="Element", cascade={"all"}, inversedBy="pokemons", fetch="EAGER")
    * @ORM\JoinTable(name="pokemons_elements")
    */
    private $elements;

    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Dresseur")
    */
    private $dresseur;


    //---------------------------------

    public function __construct() 
    {
        $this->elements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
    * @ORM\PrePersist
    */
    public function setDateCapture()
    {
        $this->dateCapture = new \DateTime();
    }

    //---------------------------------

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of dateCapture
     */ 
    public function getDateCapture()
    {
        return $this->dateCapture;
    }

    /**
     * Set the value of dateCapture
     *
     * @return  self
     */ 
    /*
    public function setDateCapture($dateCapture)
    {
        $this->dateCapture = $dateCapture;

        return $this;
    }
    */

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of elements
     * @return ArrayCollection|Element[]
     */ 
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Set the value of elements
     *
     * @return  self
     */ 
    public function setElements($elements)
    {
        $this->elements = $elements;

        return $this;
    }

    /**
     * Get the value of dresseur
     */ 
    public function getDresseur()
    {
        return $this->dresseur;
    }

    /**
     * Set the value of dresseur
     *
     * @return  self
     */ 
    public function setDresseur($dresseur)
    {
        $this->dresseur = $dresseur;

        return $this;
    }
}
