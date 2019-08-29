<?php
declare(strict_types=1);

namespace UseCases;

use DateTime;
use PetStore\Application\Commands\WeeklyRevenueReport\WeeklyRevenueReportCommand;
use PetStore\Application\Commands\WeeklyRevenueReport\WeeklyRevenueReportHandler;
use PetStore\Domain\Customer\Customer;
use PetStore\Domain\IdentityChip\IdentityChip;
use PetStore\Domain\IdentityChipType\IdentityChipType;
use PetStore\Domain\Pet\Pet;
use PetStore\Domain\PetType\PetType;
use PetStore\Domain\Transaction\Transaction;
use PHPUnit\Framework\TestCase;

final class WeeklyRevenueReportTest extends TestCase
{
    /**
     * @var Transaction[]
     */
    private $transactions;

    public function testWeeklyRevenueReportAction(): void
    {
        $command = new WeeklyRevenueReportCommand($this->transactions);
        $handler = new WeeklyRevenueReportHandler();
        $data = $handler->handle($command);
        $this->assertEquals('Total Pets Sold: 1
Total Earned: 70000
Total Revenue From Pets Sold: 70000
Total Revenue From Insurance Sold: 0
Insurance Claimed: Yes
Money Immobilized: 0', $data);

    }

    protected function setUp(): void
    {
        $petType = new PetType(1, 'dog');
        $chipType = new IdentityChipType(1, 2, 200);
        $chip = new IdentityChip(1, 1, $chipType, new DateTime('2019-08-25'));
        $pet = new Pet(1, "Zeus", new DateTime('2019-06-27'), 70000, 1, $petType, 1, $chip, true);
        $customer = new Customer(1, 'Michael Smith');
        $transaction = new Transaction(
            1,
            1,
            $pet,
            1,
            $customer,
            null,
            null,
            null,
            null,
            70000,
            0,
            0,
            70000,
            true,
            new DateTime('2019-08-28'));
        $this->transactions = [$transaction];
    }
}