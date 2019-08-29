<?php
declare(strict_types=1);


namespace PetStore\Domain\IdentityChip;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class IdentityChipNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Identity Chip you requested does not exist.';
}