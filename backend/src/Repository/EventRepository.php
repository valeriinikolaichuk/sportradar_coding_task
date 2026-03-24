<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findAllEvents(): array
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.homeTeam', 'ht')
            ->leftJoin('e.awayTeam', 'at')
            ->leftJoin('e.stage', 's')
            ->leftJoin('e.competition', 'c')
            ->leftJoin('e.winnerTeam', 'wt')
            ->leftJoin('e.stadium', 'st')
            ->leftJoin('e.groupTable', 'g')
            ->addSelect('ht', 'at', 's', 'c', 'wt', 'st', 'g')
            ->getQuery()
            ->getResult();
    }
}
