<?php
declare(strict_types=1);


namespace PetStore\Domain\Pet;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class PetNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Pet you requested does not exist.';
}