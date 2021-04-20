<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

class Refund extends BambooPaymentObject
{
    /**  @var int|null */
    private $PurchaseRefundId;

    /**  @var string */
    private $Created;

    /**  @var string|null */
    private $UniqueID;

    /**  @var float */
    private $Amount;

    /**  @var string */
    private $Currency;

    /**  @var string */
    private $Status;

    /**
     * @return int|null
     */
    public function getPurchaseRefundId(): ?int
    {
        return $this->PurchaseRefundId;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @return string|null
     */
    public function getUniqueID(): ?string
    {
        return $this->UniqueID;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->Amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->Currency;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }
}
