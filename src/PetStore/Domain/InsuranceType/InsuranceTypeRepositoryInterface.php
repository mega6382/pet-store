<?php
declare(strict_types=1);


namespace PetStore\Domain\InsuranceType;


interface InsuranceTypeRepositoryInterface
{
    /**
     * @return InsuranceType[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return InsuranceType
     */
    public function findById(int $id): InsuranceType;
}