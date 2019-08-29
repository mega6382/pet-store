<?php
declare(strict_types=1);

namespace UseCases;

use DateTime;
use PetStore\Application\Commands\ListOfPetsThatShouldBeInShowroom\ListOfPetsThatShouldBeInShowroomCommand;
use PetStore\Application\Commands\ListOfPetsThatShouldBeInShowroom\ListOfPetsThatShouldBeInShowroomHandler;
use PetStore\Domain\IdentityChip\IdentityChip;
use PetStore\Domain\IdentityChipType\IdentityChipType;
use PetStore\Domain\Pet\Pet;
use PetStore\Domain\PetType\PetType;
use PetStore\Domain\Showroom\Showroom;
use PHPUnit\Framework\TestCase;

final class ListOfPetsThatShouldBeInShowroomTest extends TestCase
{
    /**
     * @var Pet[]
     */
    private $pets;

    /**
     * @var Showroom
     */
    private $showroom;

    public function testWeeklyRevenueReportAction(): void
    {
        $command = new ListOfPetsThatShouldBeInShowroomCommand($this->pets, $this->showroom);
        $handler = new ListOfPetsThatShouldBeInShowroomHandler();
        $data = $handler->handle($command);
        $this->assertCount(1, $data);
        $this->assertEquals($this->pets[2], $data[0]);
    }

    protected function setUp(): void
    {
        $petType = new PetType(1, 'dog');
        $chipType = new IdentityChipType(1, 2, 200);
        $chip1 = new IdentityChip(1, 1, $chipType, new DateTime('2019-08-25'));
        $chip2 = new IdentityChip(2, 1, $chipType, new DateTime('2019-08-24'));
        // Dogs
        $pet1 = new Pet(1, "Scooby Doo", new DateTime('2019-08-01'), 40000, 1, $petType, null, null, false);
        $pet2 = new Pet(2, "Charlie", new DateTime('2017-03-27'), 30000, 1, $petType, 1, $chip1, true);
        $pet3 = new Pet(3, "Coco", new DateTime('2017-09-27'), 20000, 1, $petType, 2, $chip2, false);

        $showroom = new Showroom(1, "The Main Showroom", 5, 10, 15);

        $this->pets = [$pet1, $pet2, $pet3];
        $this->showroom = $showroom;
    }
}