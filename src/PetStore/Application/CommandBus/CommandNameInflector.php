<?php
declare(strict_types=1);

namespace PetStore\Application\CommandBus;

class CommandNameInflector
{
    /**
     * Get the class name for the handler of the command
     * @param CommandInterface $command
     * @return string
     */
    public function getHandler(CommandInterface $command): string
    {
        $commandReflection = (new \ReflectionObject($command));
        $commandNamespace = $commandReflection->getNamespaceName();
        $commandShortName = $commandReflection->getShortName();
        $handlerShortName = str_replace('Command', 'Handler', $commandShortName);

        return "{$commandNamespace}\\{$handlerShortName}";
    }
}