<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Payment.
 */
class Payment extends BambooPaymentObject
{
    public const CUSTOMER = 'Customer';

    /** @var bool */
    private $isSuccess;

    /** @var string */
    private $paymentId;

    /** @var int|null */
    private $purchaseId;

    /** @var string */
    private $redirectUrl;

    /** @var int */
    private $validForMinutes;

    /** @var string|null */
    private $paymentStatus;

    /** @var string|null */
    private $transactionStatus;

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * @return int
     */
    public function getValidForMinutes(): int
    {
        return $this->validForMinutes;
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
     * @return int|null
     */
    public function getPurchaseId(): ?int
    {
        return $this->purchaseId;
    }
}
