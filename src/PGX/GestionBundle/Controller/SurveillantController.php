<?php

namespace PGX\GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SurveillantController extends Controller
{
    public function indexAction()
    {
        return $this->render('PGXGestionBundle:Surveillant:index.html.twig', array(
                // ...
            ));    }

}
