<?php
declare(strict_types=1);


namespace PetStore\Domain\Timing;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class TimingNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Pet you requested does not exist.';
}