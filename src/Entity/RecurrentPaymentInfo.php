<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class RecurrentPaymentInfo.
 */
class RecurrentPaymentInfo extends BambooPaymentObject
{
    /** @var string|bool */
    private $FirstTransaction;

    /** @var string */
    private $RecurringIndicator;

    /**
     * @return bool|string
     */
    public function getFirstTransaction()
    {
        return $this->FirstTransaction;
    }

    /**
     * @return string
     */
    public function getRecurringIndicator(): string
    {
        return $this->RecurringIndicator;
    }
}
