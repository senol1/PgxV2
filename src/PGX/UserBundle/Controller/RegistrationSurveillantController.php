<?php

namespace PGX\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrationSurveillantController extends Controller
{
    public function registerAction()
    {
        return $this->container
            ->get('pugx_multi_user.registration_manager')
            ->register('PGX\UserBundle\Entity\Surveillant');
    }
}