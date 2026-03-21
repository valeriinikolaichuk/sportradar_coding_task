<?php

namespace App\Entity;

use App\Repository\ExternalApiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExternalApiRepository::class)]
class ExternalApi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $api_name = null;

    #[ORM\Column(length: 50)]
    private ?string $competition_id_key = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $competition_name_key = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $winner_key = null;

    public function getId(): ?int 
    { 
        return $this->id; 
    }

    public function getApiName(): ?string 
    { 
        return $this->api_name; 
    }

    public function setApiName(string $api_name): static 
    { 
        $this->api_name = $api_name; 
        return $this; 
    }

    public function getCompetitionId(): ?string 
    { 
        return $this->competition_id_key; 
    }

    public function setCompetitionId(string $competition_id_key): static 
    { 
        $this->competition_id_key = $competition_id_key; 
        return $this; 
    }

    public function getCompetitionName(): ?string 
    { 
        return $this->competition_name_key; 
    }

    public function setCompetitionName(?string $competition_name_key): static 
    { 
        $this->competition_name_key = $competition_name_key; 
        return $this; 
    }

    public function getWinner(): ?string 
    { 
        return $this->winner_key; 
    }

    public function setWinner(?string $winner_key): static 
    { 
        $this->winner_key = $winner_key; 
        return $this; 
    }
}