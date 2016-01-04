<?php

namespace PGX\GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfesseurController extends Controller
{
    public function indexAction()
    {
        return $this->render('PGXGestionBundle:Professeur:index.html.twig', array(
                // ...
            ));    }

}
