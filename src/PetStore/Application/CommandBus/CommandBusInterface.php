<?php
declare(strict_types=1);

namespace PetStore\Application\CommandBus;

interface CommandBusInterface
{
    public function execute(CommandInterface $command);
}