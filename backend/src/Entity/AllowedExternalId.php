<?php

namespace App\Entity;

use App\Repository\AllowedExternalIdRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllowedExternalIdRepository::class)]
class AllowedExternalId
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $competition_id = null;

    public function getId(): ?int 
    { 
        return $this->id; 
    }

    public function getCompetitionId(): ?string 
    { 
        return $this->competition_id; 
    }

    public function setCompetitionId(string $competition_id): static 
    { 
        $this->competition_id = $competition_id; 
        return $this; 
    }
}