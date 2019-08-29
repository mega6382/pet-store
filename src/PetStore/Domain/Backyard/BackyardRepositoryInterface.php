<?php
declare(strict_types=1);

namespace PetStore\Domain\Backyard;

interface BackyardRepositoryInterface
{
    /**
     * @return Backyard[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Backyard
     */
    public function findById(int $id): Backyard;
}