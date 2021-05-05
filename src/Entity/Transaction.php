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
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @return int
     */
    public function getTransactionStatusId(): int
    {
        return $this->TransactionStatusId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->Description;
    }

    /**
     * @return string|null
     */
    public function getApprovalCode(): ?string
    {
        return $this->ApprovalCode;
    }

    /**
     * @return TransactionStep[]
     */
    public function getSteps(): array
    {
        return $this->Steps;
    }
}
