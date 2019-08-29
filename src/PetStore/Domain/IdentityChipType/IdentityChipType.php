<?php
declare(strict_types=1);


namespace PetStore\Domain\IdentityChipType;

use JsonSerializable;

class IdentityChipType implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $requiredAge;
    /**
     * @var int
     */
    private $cost;

    /**
     * IdentityChipType constructor.
     * @param $id
     * @param $requiredAge
     * @param $cost
     */
    public function __construct(int $id, int $requiredAge, int $cost)
    {
        $this->id = $id;
        $this->requiredAge = $requiredAge;
        $this->cost = $cost;
    }

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRequiredAge(): int
    {
        return $this->requiredAge;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'requiredAge' => $this->requiredAge,
            'cost' => $this->cost,
        ];
    }
}