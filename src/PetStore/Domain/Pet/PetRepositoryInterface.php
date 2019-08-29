<?php
declare(strict_types=1);


namespace PetStore\Domain\Pet;


interface PetRepositoryInterface
{
    /**
     * @return Pet[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Pet
     */
    public function findById(int $id): Pet;
}