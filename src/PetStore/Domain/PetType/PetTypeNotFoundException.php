<?php
declare(strict_types=1);


namespace PetStore\Domain\PetType;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class PetTypeNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Pet Type you requested does not exist.';
}