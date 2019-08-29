<?php
declare(strict_types=1);


namespace PetStore\Domain\InsuranceType;


use PetStore\Domain\DomainException\DomainRecordNotFoundException;

class InsuranceTypeNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Insurance Type you requested does not exist.';
}