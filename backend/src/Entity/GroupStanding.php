<?php

namespace App\Entity;

use App\Repository\GroupStandingRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Team;
use App\Entity\Groups;

#[ORM\Entity(repositoryClass: GroupStandingRepository::class)]
class GroupStanding
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "_team_id", nullable: false)]
    private ?Team $team = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "_group_id", nullable: false)]
    private ?Groups $groupId = null;

    #[ORM\Column(nullable: true)]
    #[ORM\JoinColumn(nullable: false)]
    private ?int $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getGroupId(): ?Groups
    {
        return $this->groupId;
    }

    public function setGroupId(?Groups $groupId): static
    {
        $this->groupId = $groupId;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): static
    {
        $this->position = $position;

        return $this;
    }
}
