<?php
declare(strict_types=1);


namespace PetStore\Application\Commands\ListOfPetsThatShouldBeInShowroom;


use PetStore\Application\CommandBus\HandlerInterface;

class ListOfPetsThatShouldBeInShowroomHandler implements HandlerInterface
{

    /**
     * @param ListOfPetsThatShouldBeInShowroomCommand $command
     * @return false|array
     */
    public function handle($command)
    {
        $pets = $command->getPets();
        $showroom = $command->getShowroom();

        $petsQualifyingForShowroom = [];

        foreach ($pets as $pet) {
            if ($pet->shouldBeInShowroom()) {
                try {
                    $petsQualifyingForShowroom[] = $pet;
                    $showroom->addPet(1, $pet->getPetType()->getName());
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        return $petsQualifyingForShowroom;
    }
}