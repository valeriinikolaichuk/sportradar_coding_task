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

    public function findPast(
        \DateTimeImmutable $now,
        int $limit,
        ?string $sport = null,
        ?string $competition = null,
        ?\DateTimeImmutable $dateFrom = null,
        ?\DateTimeImmutable $dateTo = null
    ): array {
        $qb = $this->createQueryBuilder('e')
            ->select('DISTINCT e')
            ->leftJoin('e.homeTeam', 'ht')
            ->leftJoin('e.awayTeam', 'at')
            ->leftJoin('e.stage', 's')
            ->leftJoin('e.competition', 'c')
            ->leftJoin('e.winnerTeam', 'wt')
            ->leftJoin('e.stadium', 'st')
            ->leftJoin('e.groupTable', 'g')
            ->leftJoin('e.sport', 'sp')
            ->addSelect('ht', 'at', 's', 'c', 'wt', 'st', 'g', 'sp')
            ->where('e.matchDate < :now')
            ->setParameter('now', $now);

        if ($sport) {
            $qb->andWhere('sp.slug = :sport')
            ->setParameter('sport', $sport);
        }

        if ($competition) {
            $qb->andWhere('c.slug = :competition')
            ->setParameter('competition', $competition);
        }

        if ($dateFrom) {
            $qb->andWhere('e.matchDate >= :dateFrom')
            ->setParameter('dateFrom', $dateFrom);
        }

        if ($dateTo) {
            $qb->andWhere('e.matchDate <= :dateTo')
            ->setParameter('dateTo', $dateTo);
        }

        return $qb
            ->orderBy('e.matchDate', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findFuture(
        \DateTimeImmutable $now,
        int $limit,
        ?string $sport = null,
        ?string $competition = null,
        ?\DateTimeImmutable $dateFrom = null,
        ?\DateTimeImmutable $dateTo = null
    ): array {
        $qb = $this->createQueryBuilder('e')
            ->select('DISTINCT e')
            ->leftJoin('e.homeTeam', 'ht')
            ->leftJoin('e.awayTeam', 'at')
            ->leftJoin('e.stage', 's')
            ->leftJoin('e.competition', 'c')
            ->leftJoin('e.winnerTeam', 'wt')
            ->leftJoin('e.stadium', 'st')
            ->leftJoin('e.groupTable', 'g')
            ->leftJoin('e.sport', 'sp')
            ->addSelect('ht', 'at', 's', 'c', 'wt', 'st', 'g', 'sp')
            ->where('e.matchDate >= :now')
            ->setParameter('now', $now);

        if ($sport) {
            $qb->andWhere('sp.slug = :sport')
            ->setParameter('sport', $sport);
        }

        if ($competition) {
            $qb->andWhere('c.slug = :competition')
            ->setParameter('competition', $competition);
        }

        if ($dateFrom) {
            $qb->andWhere('e.matchDate >= :dateFrom')
            ->setParameter('dateFrom', $dateFrom);
        }

        if ($dateTo) {
            $qb->andWhere('e.matchDate <= :dateTo')
            ->setParameter('dateTo', $dateTo);
        }

        return $qb
            ->orderBy('e.matchDate', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /*
    public function findPast(\DateTimeImmutable $now, int $limit): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.matchDate < :now')
            ->setParameter('now', $now)
            ->orderBy('e.matchDate', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findFuture(\DateTimeImmutable $now, int $limit): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.matchDate >= :now')
            ->setParameter('now', $now)
            ->orderBy('e.matchDate', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    */

/*    public function findAllEvents(): array
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
*/

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
