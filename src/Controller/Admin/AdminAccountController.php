<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminAccountController extends AbstractController
{
    /**
     * Permet de se connecter à l'administration
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    #[Route('/admin/connexion', name: 'admin_account_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Admin/account/index.html.twig', [
            'current_menu' => 'dashboard',
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * Permet de se déconnecter de l'administration
     * @return void
     */
    #[Route(path: '/admin/logout', name: 'admin_account_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
