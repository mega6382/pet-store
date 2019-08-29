<?php
declare(strict_types=1);


namespace PetStore\Application\Commands\ListOfPetsThatShouldBeInShowroom;


use PetStore\Application\CommandBus\CommandInterface;
use PetStore\Domain\Pet\Pet;
use PetStore\Domain\Showroom\Showroom;

class ListOfPetsThatShouldBeInShowroomCommand implements CommandInterface
{
    /**
     * @var Pet[]
     */
    private $pets;

    /**
     * @var Showroom
     */
    private $showroom;

    /**
     * ListOfPetsThatShouldBeInShowroomCommand constructor.
     * @param Pet[] $pets
     * @param Showroom $showroom
     */
    public function __construct(array $pets, Showroom $showroom)
    {
        $this->pets = $pets;
        $this->showroom = $showroom;
    }

    /**
     * @return Showroom
     */
    public function getShowroom(): Showroom
    {
        return $this->showroom;
    }


    /**
     * @return Pet[]
     */
    public function getPets(): array
    {
        return $this->pets;
    }
}