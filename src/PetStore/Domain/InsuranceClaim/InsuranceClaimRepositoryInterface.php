<?php
declare(strict_types=1);


namespace PetStore\Domain\InsuranceClaim;


interface InsuranceClaimRepositoryInterface
{
    /**
     * @return InsuranceClaim[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return InsuranceClaim
     */
    public function findById(int $id): InsuranceClaim;
}