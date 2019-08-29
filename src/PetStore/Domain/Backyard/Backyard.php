<?php
declare(strict_types=1);

namespace PetStore\Domain\Backyard;

use JsonSerializable;

class Backyard implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int
     */
    private $dogsLimit;

    /**
     * @var int
     */
    private $catsLimit;

    /**
     * @var int
     */
    private $birdsLimit;

    public function __construct(?int $id, int $dogsLimit, int $catsLimit, int $birdsLimit)
    {
        $this->id = $id;
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
     * @return int|null
     */
    public function getCatsLimit(): int
    {
        return $this->catsLimit;
    }

    /**
     * @return int|null
     */
    public function getBirdsLimit(): int
    {
        return $this->birdsLimit;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'birdsLimit' => $this->birdsLimit,
            'catsLimit' => $this->catsLimit,
            'dogsLimit' => $this->dogsLimit,
        ];
    }
}