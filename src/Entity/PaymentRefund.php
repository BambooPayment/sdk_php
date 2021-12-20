<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class PaymentRefund.
 */
class PaymentRefund extends BambooPaymentObject
{
    /** @var bool */
    private $isSuccess;

    /** @var string|null */
    private $status;

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
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }
}
