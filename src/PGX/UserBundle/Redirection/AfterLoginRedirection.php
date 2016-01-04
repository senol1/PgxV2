<?php
/**
 * @copyright  Copyright (c) 2009-2014 Steven TITREN - www.webaki.com
 * @package    Webaki\UserBundle\Redirection
 * @author     Steven Titren <contact@webaki.com>
 */

namespace PGX\UserBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // On récupère la liste des rôles d'un utilisateur
        $roles = $token->getRoles();
        // On transforme le tableau d'instance en tableau simple
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // S'il s'agit d'un admin(Principal) ou d'un super admin on le redirige vers le backoffice
        if (in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('pgx_principal_index'));
        // sinon, s'il s'agit d'un surveillant on le redirige vers le CRM
        elseif (in_array('ROLE_SURVEILLANT', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('pgx_surveillant_index'));
        // sinon, s'il s'agit d'un proffesseur on le redirige vers le CRM
        elseif (in_array('ROLE_PROFESSEUR', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('pgx_professeur_index'));
        // sinon, s'il s'agit d'un eleve on le redirige vers le CRM
        elseif (in_array('ROLE_ELEVE', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('pgx_eleve_index'));
        // sinon il s'agit d'un membre
        else
            $redirection = new RedirectResponse($this->router->generate('pgx_gestion_homepage'));

        return $redirection;
    }
}