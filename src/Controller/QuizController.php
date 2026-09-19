<?php

namespace App\Controller;

use App\Entity\Question;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuizController extends AbstractController
{
    // Affiche une question au hasard
    #[Route('/quiz', name: 'quiz_index', methods: ['GET'])]
    public function index(QuestionRepository $questionRepository): Response
    {
        $question = $questionRepository->findRandom();

        return $this->render('quiz/index.html.twig', [
            'question' => $question,
        ]);
    }

    // Reçoit la réponse du joueur et la vérifie
    #[Route('/quiz/{id}/repondre', name: 'quiz_repondre', methods: ['POST'])]
    public function repondre(Question $question, Request $request): Response
    {
        $reponseJoueur = $request->request->getBoolean('reponse');
        $estCorrect = $reponseJoueur === $question->isReponse();

        return $this->render('quiz/resultat.html.twig', [
            'question' => $question,
            'estCorrect' => $estCorrect,
        ]);
    }
}