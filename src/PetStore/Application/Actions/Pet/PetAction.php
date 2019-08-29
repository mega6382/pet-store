<?php
declare(strict_types=1);


namespace PetStore\Application\Actions\Pet;


use PetStore\Application\Actions\Action;
use PetStore\Application\CommandBus\CommandBusInterface;
use PetStore\Domain\Pet\PetRepositoryInterface;
use PetStore\Domain\Showroom\ShowroomRepositoryInterface;

abstract class PetAction extends Action
{
    /**
     * @var PetRepositoryInterface
     */
    protected $petRepository;
    /**
     * @var ShowroomRepositoryInterface
     */
    protected $showroomRepository;

    /**
     * @var CommandBusInterface
     */
    protected $commandBus;

    /**
     * PetAction constructor.
     * @param PetRepositoryInterface $petRepository
     * @param ShowroomRepositoryInterface $showroomRepository
     * @param CommandBusInterface $commandBus
     */
    public function __construct(PetRepositoryInterface $petRepository, ShowroomRepositoryInterface $showroomRepository, CommandBusInterface $commandBus)
    {
        $this->petRepository = $petRepository;
        $this->showroomRepository = $showroomRepository;
        $this->commandBus = $commandBus;
    }

}