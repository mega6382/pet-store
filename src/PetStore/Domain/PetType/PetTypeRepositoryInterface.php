<?php
declare(strict_types=1);


namespace PetStore\Domain\PetType;


interface PetTypeRepositoryInterface
{
    /**
     * @return PetType[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return PetType
     */
    public function findById(int $id): PetType;
}