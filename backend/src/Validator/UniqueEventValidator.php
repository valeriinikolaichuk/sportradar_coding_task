<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Repository\EventRepository;
use App\Service\AddEvent\CreateEventDTO;

class UniqueEventValidator extends ConstraintValidator
{
    public function __construct(
        private EventRepository $eventRepository
    ) {}

    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof CreateEventDTO) {
            return;
        }

        if (!$value -> homeTeamId || !$value -> awayTeamId || !$value->date) {
            return; 
        }

        $exists = $this ->eventRepository->existsSameEvent(
            (int)$value -> homeTeamId,
            (int)$value -> awayTeamId,
            $value -> date
        );

        if ($exists) {
            $this ->context
                ->buildViolation($constraint -> message)
                ->addViolation();
        }
    }
}