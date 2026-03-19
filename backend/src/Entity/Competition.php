<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $season = null;

    #[ORM\ManyToOne(inversedBy: 'competitions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sports $sport = null;

    #[ORM\Column(length: 50, nullable: true, unique: true)]
    private ?string $externalIdSportradar = null;

    #[ORM\Column(length: 50, nullable: true, unique: true)]
    private ?string $externalIdAnotherapi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSeason(): ?string
    {
        return $this->season;
    }

    public function setSeason(string $season): static
    {
        $this->season = $season;

        return $this;
    }

    public function getSport(): ?Sports
    {
        return $this->sport;
    }

    public function setSport(?Sports $sport): static
    {
        $this->sport = $sport;

        return $this;
    }

    public function getyexternalIdSportradar(): ?string
    {
        return $this->externalIdSportradar;
    }

    public function setyexternalIdSportradar(?string $externalIdSportradar): static
    {
        $this->externalIdSportradar = $externalIdSportradar;

        return $this;
    }

    public function getExternalIdAnotherapi(): ?string
    {
        return $this->externalIdAnotherapi;
    }

    public function setExternalIdAnotherapi(string $externalIdAnotherapi): static
    {
        $this->externalIdAnotherapi = $externalIdAnotherapi;

        return $this;
    }
}
