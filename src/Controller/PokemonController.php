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
        $newPokemon = new Pokemon();
        $newPokemon->setNom('Tortank');
        $newPokemon->setSexe(true);

        $newElement = new Element();
        $newElement->setLibelle('Eau');
        $newElement2 = new Element();
        $newElement2->setLibelle('Terre');

        //$newPokemon->setElements(array($newElement, $newElement2));
        $em = $this->getDoctrine()->getManager();
        $elementRepository = $em->getRepository(Element::class);
        
        //$em->persist($newElement);
        //$em->persist($newElement2);

        $elementEau = $elementRepository->findOneBy(array("libelle" => 'Eau'));
        $tabElements = array();
        array_push($tabElements, $elementEau);
        $newPokemon->setElements($tabElements);
        dump($elementEau);
        //$elementEau->set(array($elementEau));
        //$em->persist($elementEau->getPokemons());

        $em->persist($newPokemon);

        $em->flush();

        foreach ($elementEau->getPokemons() as $item) {
            dump($item);
        }
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
