<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $reponse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isReponse(): ?bool
    {
        return $this->reponse;
    }

    public function setReponse(bool $reponse): static
    {
        $this->reponse = $reponse;

        return $this;
    }
}
