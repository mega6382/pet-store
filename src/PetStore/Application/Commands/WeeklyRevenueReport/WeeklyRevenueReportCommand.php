<?php
declare(strict_types=1);


namespace PetStore\Application\Commands\WeeklyRevenueReport;


use PetStore\Application\CommandBus\CommandInterface;
use PetStore\Domain\Transaction\Transaction;

class WeeklyRevenueReportCommand implements CommandInterface
{
    /**
     * @var Transaction[]
     */
    private $transactions;

    /**
     * WeeklyRevenueReportCommand constructor.
     * @param Transaction[] $transactions
     */
    public function __construct(array $transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }
}