<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Competition;
use App\Entity\Stage;
use App\Entity\Groups;
use App\Entity\Team;
use App\Entity\Stadium;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $matchDate = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTime $matchTime = null;

    #[ORM\Column(type: "string", columnDefinition: "ENUM('scheduled', 'played') NOT NULL")]
    private string $status = 'scheduled';

    #[ORM\Column(type: "integer", nullable: false, options: ["default" => 0])]
    private int $homeScore = 0;

    #[ORM\Column(type: "integer", nullable: false, options: ["default" => 0])]
    private int $awayScore = 0;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(name: "_competition_id", nullable: false)]
    private ?Competition $competition = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(name: "_stage_id", nullable: true)]
    private ?Stage $stage = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(name: "_group_id", nullable: true)]
    private ?Groups $groupTable = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "_stadium_id", nullable: true)]
    private ?Stadium $stadium = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "_home_team_id", nullable: true)]
    private ?Team $homeTeam = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "_away_team_id", nullable: true)]
    private ?Team $awayTeam = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "_winner_team_id", nullable: true)]
    private ?Team $winnerTeam = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $message = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $goals = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $yellowCards = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $secondYellowCards = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $directRedCards = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $scoreByPeriods = null;

    #[ORM\Column(length: 20)]
    private ?string $season = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchDate(): ?\DateTime
    {
        return $this->matchDate;
    }

    public function setMatchDate(\DateTime $matchDate): static
    {
        $this->matchDate = $matchDate;
        return $this;
    }

    public function getMatchTime(): ?\DateTime
    {
        return $this->matchTime;
    }

    public function setMatchTime(?\DateTime $matchTime): static
    {
        $this->matchTime = $matchTime;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getHomeScore(): ?int
    {
        return $this->homeScore;
    }

    public function setHomeScore(?int $homeScore): static
    {
        $this->homeScore = $homeScore;
        return $this;
    }

    public function getAwayScore(): ?int
    {
        return $this->awayScore;
    }

    public function setAwayScore(?int $awayScore): static
    {
        $this->awayScore = $awayScore;
        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): static
    {
        $this->competition = $competition;
        return $this;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(?Stage $stage): static
    {
        $this->stage = $stage;
        return $this;
    }

    public function getGroupTable(): ?Groups
    {
        return $this->groupTable;
    }

    public function setGroupTable(?Groups $groupTable): static
    {
        $this->groupTable = $groupTable;
        return $this;
    }

    public function getStadium(): ?Stadium
    {
        return $this->stadium;
    }

    public function setStadium(?Stadium $stadium): static
    {
        $this->stadium = $stadium;
        return $this;
    }

    public function getHomeTeam(): ?Team
    {
        return $this->homeTeam;
    }

    public function setHomeTeam(?Team $homeTeam): static
    {
        $this->homeTeam = $homeTeam;
        return $this;
    }

    public function getAwayTeam(): ?Team
    {
        return $this->awayTeam;
    }

    public function setAwayTeam(?Team $awayTeam): static
    {
        $this->awayTeam = $awayTeam;
        return $this;
    }

        public function getWinnerTeam(): ?Team
    {
        return $this->winnerTeam;
    }

    public function setWinnerTeam(?Team $winnerTeam): static
    {
        $this->winnerTeam = $winnerTeam;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function getGoals(): ?array
    {
        return $this->goals;
    }

    public function setGoals(?array $goals): static
    {
        $this->goals = $goals;
        return $this;
    }

    public function getYellowCards(): ?array
    {
        return $this->yellowCards;
    }

    public function setYellowCards(?array $yellowCards): static
    {
        $this->yellowCards = $yellowCards;
        return $this;
    }

    public function getSecondYellowCards(): ?array
    {
        return $this->secondYellowCards;
    }

    public function setSecondYellowCards(?array $secondYellowCards): static
    {
        $this->secondYellowCards = $secondYellowCards;
        return $this;
    }

    public function getDirectRedCards(): ?array
    {
        return $this->directRedCards;
    }

    public function setDirectRedCards(?array $directRedCards): static
    {
        $this->directRedCards = $directRedCards;
        return $this;
    }

    public function getScoreByPeriods(): ?array
    {
        return $this->scoreByPeriods;
    }

    public function setScoreByPeriods(?array $scoreByPeriods): static
    {
        $this->scoreByPeriods = $scoreByPeriods;
        return $this;
    }

    public function getDateTime(): \DateTimeImmutable
    {
        $date = $this ->getMatchDate();
        $time = $this ->getMatchTime();

        if (!$date) {
            throw new \LogicException('Match date is missing');
        }

        $timeString = $time ? $time ->format('H:i:s') : '00:00:00';

        return new \DateTimeImmutable(
            $date ->format('Y-m-d') . ' ' . $timeString
        );
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

        public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}