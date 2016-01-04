<?php

namespace PGX\GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrincipalController extends Controller
{
    public function indexAction()
    {
        return $this->render('PGXGestionBundle:Principal:index.html.twig');
    }
}
