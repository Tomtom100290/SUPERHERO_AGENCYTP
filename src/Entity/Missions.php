<?php

namespace App\Entity;

use App\Repository\MissionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MissionsRepository::class)]
class Missions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_mission = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $Pouvoirs_requis = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMission(): ?string
    {
        return $this->Nom_mission;
    }

    public function setNomMission(string $Nom_mission): static
    {
        $this->Nom_mission = $Nom_mission;

        return $this;
    }

    public function getPouvoirsRequis(): array
    {
        return $this->Pouvoirs_requis;
    }

    public function setPouvoirsRequis(array $Pouvoirs_requis): static
    {
        $this->Pouvoirs_requis = $Pouvoirs_requis;

        return $this;
    }
}
