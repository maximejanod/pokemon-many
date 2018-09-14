<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DresseurRepository")
 */
class Dresseur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Pokemon", mappedBy="dresseur", fetch="EAGER")
     */
    private $pokemons;

    /**
     * @ORM\OneToOne(targetEntity="Arene", mappedBy="dresseur", fetch="EAGER")
     * @ORM\JoinColumn(name="arene_id", referencedColumnName="id")
     */
    private $arene;





    //------------------------------



    //------------------------------



    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPokemons()
    {
        return $this->pokemons;
    }

    /**
     * @param mixed $pokemons
     */
    public function setPokemons($pokemons)
    {
        $this->pokemons = $pokemons;
    }

    /**
     * @return mixed
     */
    public function getArene()
    {
        return $this->arene;
    }

    /**
     * @param mixed $contact
     */
    public function setArene($arene)
    {
        $this->arene = $arene;
    }



}
