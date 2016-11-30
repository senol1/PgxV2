<?php

namespace PGX\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationProviseurController extends Controller
{
    public function registerAction()
    {
        //$discriminator = $this->container->get('pugx_user.manager.user_discriminator');
        //$discriminator->setClass('PGX\UserBundle\Entity\Proviseur   ');

        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('PGX\UserBundle\Entity\Proviseur');
    }
}