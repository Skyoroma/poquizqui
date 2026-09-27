<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

    #[Route('/jeu/reponse', name: 'jeu_reponse', methods: ['POST'])]
    public function reponse(Request $request, QuestionRepository $questionRepository): Response
    {
        $questionId = $request->request->get('questionId');
        $reponseJoueur = (bool) $request->request->get('reponse');

        $question = $questionRepository->find($questionId);
        
        if (!$question) {
            throw $this->createNotFoundException('Question introuvable');
        }

        $estCorrect = $reponseJoueur === $question->isEstVraie();

        return $this->render('question/resultat.html.twig', [
            'question' => $question,
            'estCorrect' => $estCorrect,
        ]);
    }
}