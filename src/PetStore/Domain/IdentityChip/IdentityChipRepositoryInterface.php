<?php
declare(strict_types=1);


namespace PetStore\Domain\IdentityChip;


interface IdentityChipRepositoryInterface
{
    /**
     * @return IdentityChip[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return IdentityChip
     */
    public function findById(int $id): IdentityChip;
}