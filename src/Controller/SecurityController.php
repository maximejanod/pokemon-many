<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Nom;
use App\Form\RegistrationType;

class SecurityController extends Controller
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration() {
        $nom = new Nom();

        $form = $this->createForm(RegistrationType::class, $nom);

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
