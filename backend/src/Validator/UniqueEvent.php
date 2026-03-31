<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class UniqueEvent extends Constraint
{
    public string $message = 'This event already exists.';
}