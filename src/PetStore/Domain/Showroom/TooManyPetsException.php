<?php
declare(strict_types=1);

namespace PetStore\Domain\Showroom;

use PetStore\Domain\DomainException\DomainException;

class TooManyPetsException extends DomainException
{
    public $message = 'Too many pets in the Showroom';
}