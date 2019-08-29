<?php
declare(strict_types=1);


namespace PetStore\Domain\Timing;

use JsonSerializable;

class Timing implements JsonSerializable
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var string
     */
    private $openFromDay;

    /**
     * @var string
     */
    private $openToDay;

    /**
     * Timing constructor.
     * @param int|null $id
     * @param string $openFromDay
     * @param string $openToDay
     */
    public function __construct(?int $id, string $openFromDay, string $openToDay)
    {
        $this->id = $id;
        $this->openFromDay = $openFromDay;
        $this->openToDay = $openToDay;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getOpenFromDay(): string
    {
        return $this->openFromDay;
    }

    /**
     * @return string
     */
    public function getOpenToDay(): string
    {
        return $this->openToDay;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'openFromDay' => $this->openFromDay,
            'openToDay' => $this->openToDay,
        ];
    }
}