<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Arene
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
     * ORM\OneToOne(targetEntity="Dresseur", inversedBy="arene")
     */
    private $dresseur;



    //-----------------------------




    //-----------------------------


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
    public function getDresseur()
    {
        return $this->dresseur;
    }

    /**
     * @param mixed $dresseur
     */
    public function setDresseur($dresseur)
    {
        $this->dresseur = $dresseur;
    }




}
