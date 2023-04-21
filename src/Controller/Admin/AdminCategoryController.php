<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Form\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/admin/categorie', name: 'admin_category')]
    public function index(): Response
    {
        return $this->render('admin/category/index.html.twig', [
            'current_menu' => 'category',
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    #[Route('/admin/categorie/ajout', name: 'admin_category_create')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Categories();
        $categoryForm = $this->createForm(CategoryType::class, $category);
        $categoryForm->handleRequest($request);

        if($categoryForm->isSubmitted() && $categoryForm->isValid()){
            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash('category_create_success', 'La catégorie a bien été crée !');
            return $this->redirectToRoute('admin_category');
        }

        return $this->render('admin/category/new.html.twig', [
            'categoryForm' => $categoryForm->createView(),
            'current_menu' => 'category',
        ]);
    }
}
