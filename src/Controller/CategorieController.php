<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie', methods: ['GET'])]
    public function categorie(QuestionRepository $questionRepository)
    {
        $categorie = $questionRepository->getCategorie();

        return $this->render('Categorie/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}