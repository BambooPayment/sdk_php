<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class PaymentStatus.
 */
class PaymentStatus extends BambooPaymentObject
{
    /** @var bool */
    private $isSuccess;

    /** @var int|null */
    private $purchaseId;

    /** @var string|null */
    private $paymentStatus;

    /** @var string|null */
    private $transactionStatus;

    /** @var array|null */
    private $metadata;

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    /**
     * @param bool $isSuccess
     */
    public function setIsSuccess(bool $isSuccess): void
    {
        $this->isSuccess = $isSuccess;
    }

    /**
     * @return int|null
     */
    public function getPurchaseId(): ?int
    {
        return $this->purchaseId;
    }

    /**
     * @param int|null $purchaseId
     */
    public function setPurchaseId(?int $purchaseId): void
    {
        $this->purchaseId = $purchaseId;
    }

    /**
     * @return string|null
     */
    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    /**
     * @param string|null $paymentStatus
     */
    public function setPaymentStatus(?string $paymentStatus): void
    {
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return string|null
     */
    public function getTransactionStatus(): ?string
    {
        return $this->transactionStatus;
    }

    /**
     * @param string|null $transactionStatus
     */
    public function setTransactionStatus(?string $transactionStatus): void
    {
        $this->transactionStatus = $transactionStatus;
    }

    /**
     * @return array|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array|null $metadata
     */
    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }
}
