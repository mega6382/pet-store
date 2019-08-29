<?php
declare(strict_types=1);


namespace PetStore\Domain\InsuranceType;

use JsonSerializable;

class InsuranceType implements JsonSerializable
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var int
     */
    private $duration;

    /**
     * @var int
     */
    private $cost;

    /**
     * @var int
     */
    private $cashback;

    /**
     * InsuranceType constructor.
     * @param int|null $id
     * @param int $duration
     * @param int $cost
     * @param int $cashback
     */
    public function __construct(?int $id, int $duration, int $cost, int $cashback)
    {
        $this->id = $id;
        $this->duration = $duration;
        $this->cost = $cost;
        $this->cashback = $cashback;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @return int
     */
    public function getCashback(): int
    {
        return $this->cashback;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'cost' => $this->cost,
            'duration' => $this->duration,
            'cashback' => $this->cashback,
        ];
    }


}