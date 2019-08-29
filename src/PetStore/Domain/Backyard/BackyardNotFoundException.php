<?php
declare(strict_types=1);


namespace PetStore\Domain\Backyard;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class BackyardNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Backyard you requested does not exist.';
}