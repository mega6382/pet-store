<?php
declare(strict_types=1);


namespace PetStore\Application\Commands\WeeklyRevenueReport;


use PetStore\Application\CommandBus\HandlerInterface;

class WeeklyRevenueReportHandler implements HandlerInterface
{

    /**
     * @param WeeklyRevenueReportCommand $command
     * @return string
     */
    public function handle($command)
    {
        $transactions = $command->getTransactions();
        $weeklyReport = [
            'totalPetsSold' => count($transactions),
            'totalEarned' => 0,
            'totalRevenueFromPetsSold' => 0,
            'totalRevenueFromInsuranceSold' => 0,
            'insuranceClaimed' => false,
            'moneyImmobilized' => 0
        ];

        foreach ($transactions as $transaction) {
            $weeklyReport['totalEarned'] += $transaction->getTotalAmountPaid();
            $weeklyReport['totalRevenueFromPetsSold'] += $transaction->getPetCost();
            $weeklyReport['totalRevenueFromInsuranceSold'] += $transaction->getInsuranceCost();
            $weeklyReport['insuranceClaimed'] = $transaction->getInsuranceClaimId() === null ? 'Yes' : 'No';
            if ($transaction->getInsuranceClaim()) {
                $weeklyReport['moneyImmobilized'] = $transaction->getInsuranceClaim()->getRefundedAmount();
            }
        }

        return <<<EOF
Total Pets Sold: {$weeklyReport['totalPetsSold']}
Total Earned: {$weeklyReport['totalEarned']}
Total Revenue From Pets Sold: {$weeklyReport['totalRevenueFromPetsSold']}
Total Revenue From Insurance Sold: {$weeklyReport['totalRevenueFromInsuranceSold']}
Insurance Claimed: {$weeklyReport['insuranceClaimed']}
Money Immobilized: {$weeklyReport['moneyImmobilized']}
EOF;
    }
}