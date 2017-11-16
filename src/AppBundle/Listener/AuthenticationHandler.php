<?php

namespace  AppBundle\Listener;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine) {
        $this->doctrine = $doctrine;
    }

    function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $token->getUser()->setLastLogin(new \DateTime());
        $this->doctrine->getManager()->flush();

        return new RedirectResponse($request->getSession()->get('_security.main.target_path', $request->getBaseURL()!=""?$request->getBaseURL():"/"));
    }
}