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

    public function findOneEventWithRelations(int $id): ?Event
    {
        return $this->createQueryBuilder('e')
            ->leftJoin('e.homeTeam', 'ht')
            ->leftJoin('e.awayTeam', 'at')
            ->leftJoin('e.competition', 'c')
            ->leftJoin('e.stage', 's')
            ->addSelect('ht', 'at', 'c', 's')
            ->where('e.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function existsSameEvent(int $homeId, int $awayId): bool
    {
        return (bool) $this->createQueryBuilder('e')
            ->select('1')
            ->where('e.homeTeam = :home')
            ->andWhere('e.awayTeam = :away')
            ->andWhere('e.matchDate = :date')
            ->setParameters([
                'home' => $homeId,
                'away' => $awayId,
                'date' => new \DateTimeImmutable($date),
            ])
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
