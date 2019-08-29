<?php
declare(strict_types=1);


namespace PetStore\Domain\Showroom;

use JsonSerializable;
use PetStore\Domain\PetType\PetTypeNotFoundException;

class Showroom implements JsonSerializable
{
    /**
     * @var null|int
     */
    private $id;
    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $dogsLimit;

    /**
     * @var int
     */
    private $dogs;

    /**
     * @var int
     */
    private $catsLimit;

    /**
     * @var int
     */
    private $cats;

    /**
     * @var int
     */
    private $birdsLimit;
    /**
     * @var int
     */
    private $birds;

    /**
     * Showroom constructor.
     * @param int|null $id
     * @param string $description
     * @param int $dogsLimit
     * @param int $catsLimit
     * @param int $birdsLimit
     */
    public function __construct(?int $id, string $description, int $dogsLimit, int $catsLimit, int $birdsLimit)
    {
        $this->id = $id;
        $this->description = $description;
        $this->dogsLimit = $dogsLimit;
        $this->catsLimit = $catsLimit;
        $this->birdsLimit = $birdsLimit;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getDogsLimit(): int
    {
        return $this->dogsLimit;
    }

    /**
     * @return int
     */
    public function getDogs(): int
    {
        return $this->dogs;
    }

    /**
     * @param int $pets
     * @param $type
     * @throws TooManyPetsException
     * @throws PetTypeNotFoundException
     */
    public function addPet(int $pets, $type): void
    {
        if ($type === 'dog') {
            $this->addDogs($pets);
        } elseif ($type === 'cat') {
            $this->addCats($pets);
        } elseif ($type === 'bird') {
            $this->addBirds($pets);
        } else {
            throw new PetTypeNotFoundException();
        }
    }

    /**
     * @param int $dogs
     * @throws TooManyPetsException
     */
    public function addDogs(int $dogs): void
    {
        if ($this->dogs + $dogs > $this->dogsLimit) {
            throw new TooManyPetsException();
        }
        $this->dogs = $dogs;
    }

    /**
     * @param int $cats
     * @throws TooManyPetsException
     */
    public function addCats(int $cats): void
    {
        if ($this->cats + $cats > $this->catsLimit) {
            throw new TooManyPetsException();
        }
        $this->cats = $cats;
    }

    /**
     * @param int $birds
     * @throws TooManyPetsException
     */
    public function addBirds(int $birds): void
    {
        if ($this->birds + $birds > $this->birdsLimit) {
            throw new TooManyPetsException();
        }
        $this->birds += $birds;
    }

    /**
     * @param int $dogs
     */
    public function removeDogs(int $dogs): void
    {
        if ($this->dogs - $dogs < 0) {
            $this->dogs = 0;
        }
        $this->dogs -= $dogs;
    }

    /**
     * @return int|null
     */
    public function getCatsLimit(): int
    {
        return $this->catsLimit;
    }

    /**
     * @return int
     */
    public function getCats(): int
    {
        return $this->cats;
    }

    /**
     * @param int $cats
     */
    public function removeCats(int $cats): void
    {
        if ($this->cats - $cats < 0) {
            $this->cats = 0;
        }
        $this->cats -= $cats;
    }

    /**
     * @return int|null
     */
    public function getBirdsLimit(): int
    {
        return $this->birdsLimit;
    }

    /**
     * @return int
     */
    public function getBirds(): int
    {
        return $this->birds;
    }

    /**
     * @param int $birds
     */
    public function removeBirds(int $birds): void
    {
        if ($this->birds - $birds < 0) {
            $this->birds = 0;
        }
        $this->birds -= $birds;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'birdsLimit' => $this->birdsLimit,
            'birds' => $this->birds,
            'catsLimit' => $this->catsLimit,
            'cats' => $this->cats,
            'dogsLimit' => $this->dogsLimit,
            'dogs' => $this->dogs,
        ];
    }
}