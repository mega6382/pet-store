<?php
declare(strict_types=1);


namespace PetStore\Domain\InsuranceClaim;

use DateTime;
use JsonSerializable;

class InsuranceClaim implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $refunded;

    /**
     * @var int
     */
    private $refundedAmount;

    /**
     * @var bool
     */
    private $closed;

    /**
     * @var DateTime
     */
    private $dateCreated;

    /**
     * InsuranceClaim constructor.
     * @param null|int $id
     * @param bool $refunded
     * @param int $refundedAmount
     * @param bool $closed
     * @param DateTime $dateCreated
     */
    public function __construct(?int $id, bool $refunded, int $refundedAmount, bool $closed, DateTime $dateCreated)
    {
        $this->id = $id;
        $this->refunded = $refunded;
        $this->refundedAmount = $refundedAmount;
        $this->closed = $closed;
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isRefunded(): bool
    {
        return $this->refunded;
    }

    /**
     * @return int
     */
    public function getRefundedAmount(): int
    {
        return $this->refundedAmount;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->closed;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'refunded' => $this->refunded,
            'refundedAmount' => $this->refundedAmount,
            'closed' => $this->closed,
            'dateCreated' => $this->dateCreated,
        ];
    }
}