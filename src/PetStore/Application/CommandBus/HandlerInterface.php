<?php
declare(strict_types=1);

namespace PetStore\Application\CommandBus;
interface HandlerInterface
{
    public function handle($command);
}