<?php
declare(strict_types=1);


namespace PetStore\Domain\Customer;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class CustomerNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Customer you requested does not exist.';
}