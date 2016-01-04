<?php

namespace PGX\GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        if (false === $this->get('security.context')->isGranted(
                'IS_AUTHENTICATED_REMEMBERED '
            )) {

            if ($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN')) {
                return $this->redirect($this->generateUrl('pgx_principal_index'));
            }

            elseif ($this->get('security.context')->isGranted('ROLE_ADMIN')) {
                return $this->redirect($this->generateUrl('pgx_principal_index'));
            }
            elseif ($this->get('security.context')->isGranted('ROLE_SURVEILLANT')) {
                return $this->redirect($this->generateUrl('pgx_surveillant_index'));
            }
            elseif ($this->get('security.context')->isGranted('ROLE_PROFESSEUR')) {
                return $this->redirect($this->generateUrl('pgx_professeur_index'));
            }
            elseif ($this->get('security.context')->isGranted('ROLE_ELEVE')) {
                return $this->redirect($this->generateUrl('pgx_eleve_index'));
            }
        }

        return $this->redirect($this->generateUrl('fos_user_security_login'));
    }

    public function boxeInfoAction(){
        return $this->render('PGXGestionBundle:Default:boxeInfo.html.twig', array(
            // ...
        ));
    }
}
