<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="user_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('security/login.html.twig', array('error' => $authenticationUtils->getLastAuthenticationError(), 'lastUsername' => $authenticationUtils->getLastUsername()));
    }

    /**
     * @Route("/logout",name="logout")
     */
    public function logout()
    {

    }
}
