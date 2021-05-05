<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Transaction
 * Transaction of a purchase.
 */
class Transaction extends BambooPaymentObject
{
    public const STEPS = 'Steps';

    /** @var int */
    private $TransactionId;

    /** @var string */
    private $Created;

    /** @var int */
    private $TransactionStatusId;

    /** @var string */
    private $Status;

    /** @var string|null */
    private $Description;

    /** @var string|null */
    private $ApprovalCode;

    /** @var TransactionStep[] */
    private $Steps;

    public function hydrate(array $data): self
    {
        $steps             = $data[self::STEPS] ?? [];
        $data[self::STEPS] = [];
        foreach ($steps as $step) {
            $transactionStep     = new TransactionStep();
            $data[self::STEPS][] = $transactionStep->hydrate($step);
        }

        return parent::hydrate($data);
    }

    /**
     * @return int
     */
    public function getTransactionId(): int
    {
        return $this->TransactionId;
    }

    /**
     * @param int $TransactionId
     */
    public function setTransactionId(int $TransactionId): void
    {
        $this->TransactionId = $TransactionId;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @param string $Created
     */
    public function setCreated(string $Created): void
    {
        $this->Created = $Created;
    }

    /**
     * @return int
     */
    public function getTransactionStatusId(): int
    {
        return $this->TransactionStatusId;
    }

    /**
     * @param int $TransactionStatusId
     */
    public function setTransactionStatusId(int $TransactionStatusId): void
    {
        $this->TransactionStatusId = $TransactionStatusId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     */
    public function setStatus(string $Status): void
    {
        $this->Status = $Status;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * @param string|null $Description
     */
    public function setDescription(?string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return string|null
     */
    public function getApprovalCode(): ?string
    {
        return $this->ApprovalCode;
    }

    /**
     * @param string|null $ApprovalCode
     */
    public function setApprovalCode(?string $ApprovalCode): void
    {
        $this->ApprovalCode = $ApprovalCode;
    }

    /**
     * @return TransactionStep[]
     */
    public function getSteps(): array
    {
        return $this->Steps;
    }

    /**
     * @param TransactionStep[] $Steps
     */
    public function setSteps(array $Steps): void
    {
        $this->Steps = $Steps;
    }
}
