<?php
declare(strict_types=1);


namespace PetStore\Domain\Transaction;


interface TransactionRepositoryInterface
{
    /**
     * @return Transaction[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Transaction
     */
    public function findById(int $id): Transaction;


    /**
     * @return Transaction[]
     */
    public function findByCurrentWeek(): array;
}