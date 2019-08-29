<?php
declare(strict_types=1);


namespace PetStore\Domain\IdentityChipType;


interface IdentityChipTypeRepositoryInterface
{
    /**
     * @return IdentityChipType[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return IdentityChipType
     */
    public function findById(int $id): IdentityChipType;
}