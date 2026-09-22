<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie', methods: ['GET'])]
    public function categorie(CategorieRepository $categorieRepository): Response
    {
        $categorie = $categorieRepository->findAll();

        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}