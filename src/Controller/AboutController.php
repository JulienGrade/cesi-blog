<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * Permet d'afficher la page about
     * @return Response
     */
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        return $this->render('about/index.html.twig', [
            'current_menu' => 'about',
        ]);
    }
}
