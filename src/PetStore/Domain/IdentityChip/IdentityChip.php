<?php
declare(strict_types=1);


namespace PetStore\Domain\IdentityChip;

use DateTime;
use JsonSerializable;
use PetStore\Domain\IdentityChipType\IdentityChipType;

class IdentityChip implements JsonSerializable
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var int
     */
    private $identityChipTypeId;

    /**
     * @var IdentityChipType
     */
    private $identityChipType;

    /**
     * @var DateTime
     */
    private $dateAdded;

    /**
     * IdentityChip constructor.
     * @param int|null $id
     * @param int $identityChipTypeId
     * @param null|IdentityChipType $identityChipType
     * @param DateTime $dateAdded
     */
    public function __construct(?int $id, int $identityChipTypeId, ?IdentityChipType $identityChipType, DateTime $dateAdded)
    {
        $this->id = $id;
        $this->identityChipTypeId = $identityChipTypeId;
        $this->identityChipType = $identityChipType;
        $this->dateAdded = $dateAdded;
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
    public function getIdentityChipTypeId(): int
    {
        return $this->identityChipTypeId;
    }

    /**
     * @return IdentityChipType
     */
    public function getIdentityChipType(): IdentityChipType
    {
        return $this->identityChipType;
    }

    /**
     * @return DateTime
     */
    public function getDateAdded(): DateTime
    {
        return $this->dateAdded;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'identityChipType' => $this->identityChipType,
            'dateAdded' => $this->dateAdded,
        ];
    }
}