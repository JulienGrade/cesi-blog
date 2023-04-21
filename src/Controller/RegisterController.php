<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * Permet d'afficher la page d'inscription
     * @return Response
     */
    #[Route('/inscription', name: 'register')]
    public function index(): Response
    {
        return $this->render('register/index.html.twig', [
            'current_menu' => 'homepage',
        ]);
    }
}
