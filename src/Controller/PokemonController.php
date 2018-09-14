<?php

namespace App\Controller;

use App\Entity\Arene;
use App\Entity\Dresseur;
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

        /* @var $arene Arene */
        $arene = new Arene();
        $arene->setNom('Bourg Palette');
        $em->persist($arene);
        $em->flush();

        /* @var $dresseur Dresseur */
        $dresseur = new Dresseur();
        $dresseur->setNom('Sacha');
        $dresseur->setArene($arene);
        $arene->setDresseur($dresseur);
        $em->persist($dresseur);
        $em->persist($arene);
        $em->flush();

        $newPokemon = new Pokemon();
        $newPokemon->setNom('Tortank');
        $newPokemon->setSexe(true);

        $newElement = new Element();
        $newElement->setLibelle('Eau');
        $newElement2 = new Element();
        $newElement2->setLibelle('Terre');

        $newPokemon->setElements(array($newElement, $newElement2));
        $newPokemon->setDresseur($dresseur);

        $em->persist($newPokemon);
        $em->flush();



        $dresseurRepository = $em->getRepository(Dresseur::class);
        $sacha = $dresseurRepository->findOneBy(array('nom' => 'Sacha'));

        dump($sacha);
        

        return $this->render('pokemon/index.html.twig', [
            'controller_name' => 'PokemonController',
        ]);
    }
}
