<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{
    #[Route('/jeu', name: 'jeu', methods: ['GET'])]
    public function jeu(QuestionRepository $questionRepository): Response
    {
        $question = $questionRepository->findRandom();

        return $this->render('question/jeu.html.twig', [
            'question' => $question,
        ]);
    }
}