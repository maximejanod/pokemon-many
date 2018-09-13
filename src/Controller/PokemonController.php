<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pokemon;
use App\Entity\Element;

class PokemonController extends AbstractController
{
    /**
     * @Route("/pokemon", name="pokemon")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        $newPokemon = new Pokemon();
        $newPokemon->setNom('Tortank');
        $newPokemon->setSexe(true);

        $newElement = new Element();
        $newElement->setLibelle('Eau');
        $newElement2 = new Element();
        $newElement2->setLibelle('Terre');

        $newPokemon->setElements(array($newElement, $newElement2));

        $em->persist($newPokemon);

        $em->flush();

        $pokemonRepository = $em->getRepository(Pokemon::class);
        $allPkm = $pokemonRepository->findAll();

        
        foreach($allPkm as $pkm) {
            //dump($pkm);
        }
        

        return $this->render('pokemon/index.html.twig', [
            'controller_name' => 'PokemonController',
        ]);
    }
}
