<?php

namespace PGX\GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EleveController extends Controller
{
    public function indexAction()
    {
        return $this->render('PGXGestionBundle:Eleve:index.html.twig', array(
                // ...
            ));    }

}
