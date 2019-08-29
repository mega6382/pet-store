<?php
declare(strict_types=1);


namespace PetStore\Domain\InsuranceClaim;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class InsuranceClaimNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Insurance Type you requested does not exist.';
}