<?php
declare(strict_types=1);


namespace PetStore\Domain\Transaction;

use DateTime;
use JsonSerializable;
use PetStore\Domain\Customer\Customer;
use PetStore\Domain\InsuranceClaim\InsuranceClaim;
use PetStore\Domain\InsuranceType\InsuranceType;
use PetStore\Domain\Pet\Pet;

class Transaction implements JsonSerializable
{
    /**
     * @var null|int
     */
    private $id;

    /**
     * @var int
     */
    private $petId;

    /**
     * @var Pet
     */
    private $pet;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var int
     */
    private $insuranceTypeId;

    /**
     * @var InsuranceType
     */
    private $insuranceType;

    /**
     * @var int
     */
    private $insuranceClaimId;

    /**
     * @var InsuranceClaim
     */
    private $insuranceClaim;

    /**
     * @var int
     */
    private $petCost;

    /**
     * @var int
     */
    private $insuranceCost;

    /**
     * @var int
     */
    private $amountPaidUpfront;

    /**
     * @var int
     */
    private $totalAmountPaid;

    /**
     * @var bool
     */
    private $petDelivered;

    /**
     * @var DateTime
     */
    private $transactionDate;

    /**
     * Transaction constructor.
     * @param int|null $id
     * @param int $petId
     * @param Pet $pet
     * @param int $customerId
     * @param Customer $customer
     * @param null|int $insuranceTypeId
     * @param null|InsuranceType $insuranceType
     * @param null|int $insuranceClaimId
     * @param null|InsuranceClaim $insuranceClaim
     * @param int $petCost
     * @param int $insuranceCost
     * @param int $amountPaidUpfront
     * @param int $totalAmountPaid
     * @param bool $petDelivered
     * @param DateTime $transactionDate
     */
    public function __construct(?int $id, int $petId, Pet $pet, int $customerId, Customer $customer, ?int $insuranceTypeId, ?InsuranceType $insuranceType, ?int $insuranceClaimId, ?InsuranceClaim $insuranceClaim, int $petCost, int $insuranceCost, int $amountPaidUpfront, int $totalAmountPaid, bool $petDelivered, DateTime $transactionDate)
    {
        $this->id = $id;
        $this->petId = $petId;
        $this->pet = $pet;
        $this->customerId = $customerId;
        $this->customer = $customer;
        $this->insuranceTypeId = $insuranceTypeId;
        $this->insuranceType = $insuranceType;
        $this->insuranceClaimId = $insuranceClaimId;
        $this->insuranceClaim = $insuranceClaim;
        $this->petCost = $petCost;
        $this->insuranceCost = $insuranceCost;
        $this->amountPaidUpfront = $amountPaidUpfront;
        $this->totalAmountPaid = $totalAmountPaid;
        $this->petDelivered = $petDelivered;
        $this->transactionDate = $transactionDate;
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
    public function getPetId(): int
    {
        return $this->petId;
    }

    /**
     * @return Pet
     */
    public function getPet(): Pet
    {
        return $this->pet;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return int
     */
    public function getInsuranceTypeId(): int
    {
        return $this->insuranceTypeId;
    }

    /**
     * @return InsuranceType
     */
    public function getInsuranceType(): InsuranceType
    {
        return $this->insuranceType;
    }

    /**
     * @return int
     */
    public function getPetCost(): int
    {
        return $this->petCost;
    }

    /**
     * @return int
     */
    public function getInsuranceCost(): int
    {
        return $this->insuranceCost;
    }

    /**
     * @return int
     */
    public function getInsuranceClaimId(): ?int
    {
        return $this->insuranceClaimId;
    }

    /**
     * @return InsuranceClaim
     */
    public function getInsuranceClaim(): ?InsuranceClaim
    {
        return $this->insuranceClaim;
    }

    /**
     * @return int
     */
    public function getAmountPaidUpfront(): int
    {
        return $this->amountPaidUpfront;
    }

    /**
     * @return int
     */
    public function getTotalAmountPaid(): int
    {
        return $this->totalAmountPaid;
    }

    /**
     * @return bool
     */
    public function isPetDelivered(): bool
    {
        return $this->petDelivered;
    }

    /**
     * @return DateTime
     */
    public function getTransactionDate(): DateTime
    {
        return $this->transactionDate;
    }


    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'pet' => $this->pet,
            'customer' => $this->customer,
            'insuranceType' => $this->insuranceType,
            'insuranceClaim' => $this->insuranceClaim,
            'amountPaidUpfront' => $this->amountPaidUpfront,
            'totalAmountPaid' => $this->totalAmountPaid,
            'petDelivered' => $this->petDelivered,
            'transactionDate' => $this->transactionDate,
        ];
    }

}