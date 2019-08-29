<?php
declare(strict_types=1);


namespace PetStore\Application\Actions\Transaction;


use PetStore\Application\Commands\WeeklyRevenueReport\WeeklyRevenueReportCommand;
use PetStore\Application\Notification\Message;
use Psr\Http\Message\ResponseInterface as Response;

class WeeklyRevenueReportAction extends TransactionAction
{

    /**
     * @return Response
     */
    protected function action(): Response
    {
        $transactions = $this->transactionRepository->findByCurrentWeek();
        $command = new WeeklyRevenueReportCommand($transactions);

        $formattedMessage = $this->commandBus->execute($command);
        $message = new Message($formattedMessage);

        return $this->respondWithData($this->notifier->notify($message));
    }
}