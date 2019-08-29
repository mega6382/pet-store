<?php
declare(strict_types=1);


namespace PetStore\Application\Actions\Pet;

use PetStore\Application\Commands\ListOfPetsThatShouldBeInShowroom\ListOfPetsThatShouldBeInShowroomCommand;
use Psr\Http\Message\ResponseInterface as Response;

class ListOfPetsThatShouldBeInShowroomAction extends PetAction
{
    /**
     * @return Response
     */
    protected function action(): Response
    {
        $pets = $this->petRepository->findAll();
        $showroom = $this->showroomRepository->findById(1);
        $command = new ListOfPetsThatShouldBeInShowroomCommand($pets, $showroom);

        return $this->respondWithData($this->commandBus->execute($command));
    }
}