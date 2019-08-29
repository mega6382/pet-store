<?php
declare(strict_types=1);


namespace PetStore\Domain\Transaction;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class TransactionNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Pet you requested does not exist.';
}