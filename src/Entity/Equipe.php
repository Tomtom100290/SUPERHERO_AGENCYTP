<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_equipe = null;

    #[ORM\Column(length: 255)]
    private ?string $Leader_equipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->Nom_equipe;
    }

    public function setNomEquipe(string $Nom_equipe): static
    {
        $this->Nom_equipe = $Nom_equipe;

        return $this;
    }

    public function getLeaderEquipe(): ?string
    {
        return $this->Leader_equipe;
    }

    public function setLeaderEquipe(string $Leader_equipe): static
    {
        $this->Leader_equipe = $Leader_equipe;

        return $this;
    }
}
