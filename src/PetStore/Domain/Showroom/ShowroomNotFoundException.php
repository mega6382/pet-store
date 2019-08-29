<?php
declare(strict_types=1);


namespace PetStore\Domain\Showroom;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class ShowroomNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Showroom you requested does not exist.';
}