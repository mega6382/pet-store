<?php
declare(strict_types=1);


use DI\ContainerBuilder;
use PetStore\Application\CommandBus\CommandBus;
use PetStore\Application\CommandBus\CommandBusInterface;
use PetStore\Application\CommandBus\CommandNameInflector;
use PetStore\Application\Notification\NotifierInterface;
use PetStore\Infrastructure\Notifier\WebNotifier;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        CommandBusInterface::class => new CommandBus(new CommandNameInflector()),
        NotifierInterface::class => new WebNotifier()
    ]);
};