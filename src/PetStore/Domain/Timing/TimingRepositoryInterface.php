<?php
declare(strict_types=1);


namespace PetStore\Domain\Timing;


interface TimingRepositoryInterface
{
    /**
     * @return Timing[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Timing
     */
    public function findById(int $id): Timing;
}