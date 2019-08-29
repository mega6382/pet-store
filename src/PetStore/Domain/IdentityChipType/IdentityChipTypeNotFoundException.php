<?php
declare(strict_types=1);


namespace PetStore\Domain\IdentityChipType;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class IdentityChipTypeNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Identity Chip you requested does not exist.';
}