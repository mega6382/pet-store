<?php
declare(strict_types=1);


namespace PetStore\Application\Actions\Transaction;


use PetStore\Application\Actions\Action;
use PetStore\Application\CommandBus\CommandBusInterface;
use PetStore\Application\Notification\NotifierInterface;
use PetStore\Domain\Transaction\TransactionRepositoryInterface;

abstract class TransactionAction extends Action
{
    /**
     * @var TransactionRepositoryInterface
     */
    protected $transactionRepository;

    /**
     * @var NotifierInterface
     */
    protected $notifier;

    /**
     * @var CommandBusInterface
     */
    protected $commandBus;

    /**
     * TransactionAction constructor.
     * @param TransactionRepositoryInterface $transactionRepository
     * @param NotifierInterface $notifier
     * @param CommandBusInterface $commandBus
     */
    public function __construct(TransactionRepositoryInterface $transactionRepository, NotifierInterface $notifier, CommandBusInterface $commandBus)
    {
        $this->transactionRepository = $transactionRepository;
        $this->notifier = $notifier;
        $this->commandBus = $commandBus;
    }

}