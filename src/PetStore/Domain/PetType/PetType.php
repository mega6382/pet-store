<?php
declare(strict_types=1);


namespace PetStore\Domain\PetType;

use JsonSerializable;

class PetType implements JsonSerializable
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * PetType constructor.
     * @param int|null $id
     * @param string $name
     */
    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}