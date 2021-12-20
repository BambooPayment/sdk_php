<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class ExchangeRate.
 */
class ExchangeRate extends BambooPaymentObject
{
    /** @var int */
    private $amount;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}
