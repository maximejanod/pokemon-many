<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ElementRepository")
 */
class Element
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
    private $libelle;


    /**
    * @ORM\ManyToMany(targetEntity="Pokemon", cascade={"all"}, mappedBy="elements", fetch="EAGER")
    */
    private $pokemons;






    //---------------------------------

    /**
     * Element constructor.
     */
    public function __construct()
    {
        $this->pokemons = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of pokemons
     * @return ArrayCollection|Pokemon[]
     */ 
    public function getPokemons()
    {
        return $this->pokemons;
    }

    /**
     * Set the value of pokemons
     *
     * @return  self
     */ 
    public function setPokemons($pokemons)
    {
        $this->pokemons = $pokemons;

        return $this;
    }
}
