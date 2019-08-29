<?php
declare(strict_types=1);


namespace PetStore\Domain\Customer;


interface CustomerRepositoryInterface
{
    /**
     * @return Customer[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Customer
     */
    public function findById(int $id): Customer;
}