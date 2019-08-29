<?php
declare(strict_types=1);

namespace PetStore\Application\CommandBus;

class CommandBus implements CommandBusInterface
{
    /**
     * @var CommandNameInflector
     */
    private $inflector;

    public function __construct(CommandNameInflector $inflector)
    {
        $this->inflector = $inflector;
    }

    /**
     * Execute the given command
     * @param CommandInterface $command
     * @return mixed
     */
    public function execute(CommandInterface $command)
    {
        return $this->getHandler($command)->handle($command);
    }

    /**
     * Get the object of handler for the command
     * @param CommandInterface $command
     * @return HandlerInterface
     */
    private function getHandler(CommandInterface $command): HandlerInterface
    {
        $handler = $this->inflector->getHandler($command);
        return new $handler($command);
    }
}