<?php
declare(strict_types=1);

namespace PetStore\Domain\Showroom;

interface ShowroomRepositoryInterface
{
    /**
     * @return Showroom[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Showroom
     */
    public function findById(int $id): Showroom;
}