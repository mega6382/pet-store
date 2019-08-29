<?php
declare(strict_types=1);


namespace PetStore\Domain\Pet;

use DateTime;
use JsonSerializable;
use PetStore\Domain\IdentityChip\IdentityChip;
use PetStore\Domain\PetType\PetType;

class Pet implements JsonSerializable
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
     * @var DateTime
     */
    private $dateOfBirth;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $petTypeId;

    /**
     * @var PetType
     */
    private $petType;
    /**
     * @var int
     */
    private $identityChipId;

    /**
     * @var IdentityChip
     */
    private $identityChip;
    /**
     * @var bool
     */
    private $isSold;

    /**
     * Pet constructor.
     * @param int|null $id
     * @param string $name
     * @param DateTime $dateOfBirth
     * @param int $price
     * @param int $petTypeId
     * @param null|PetType $petType
     * @param null|int $identityChipId
     * @param null|IdentityChip $identityChip
     * @param bool $isSold
     */
    public function __construct(?int $id, string $name, DateTime $dateOfBirth, int $price, int $petTypeId, ?PetType $petType, ?int $identityChipId, ?IdentityChip $identityChip, bool $isSold)
    {
        $this->id = $id;
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
        $this->price = $price;
        $this->petTypeId = $petTypeId;
        $this->petType = $petType;
        $this->identityChipId = $identityChipId;
        $this->identityChip = $identityChip;
        $this->isSold = $isSold;
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
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getPetTypeId(): int
    {
        return $this->petTypeId;
    }

    /**
     * @return PetType
     */
    public function getPetType(): PetType
    {
        return $this->petType;
    }

    /**
     * @return int
     */
    public function getIdentityChipId(): ?int
    {
        return $this->identityChipId;
    }

    /**
     * @return IdentityChip
     */
    public function getIdentityChip(): ?IdentityChip
    {
        return $this->identityChip;
    }

    /**
     * @return bool
     */
    public function isSold(): bool
    {
        return $this->isSold;
    }

    /**
     * @return bool
     */
    public function shouldBeInShowroom(): bool
    {
        return !$this->isSold && $this->identityChipId !== null;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function isPetType(string $type): bool
    {
        return $this->petType->getName() === $type;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dateOfBirth' => $this->dateOfBirth,
            'price' => $this->price,
            'typeId' => $this->petTypeId,
            'petType' => $this->petType,
            'identityChipId' => $this->identityChipId,
            'identityChip' => $this->identityChip,
            'isSold' => $this->isSold,
        ];
    }

}