<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class RecurrentPaymentInfo
 */
class RecurrentPaymentInfo extends BambooPaymentObject
{
    /** @var string|boolean */
    private $FristTransaction;

    /** @var string */
    private $RecurringIndicator;

    /**
     * @return bool|string
     */
    public function getFristTransaction()
    {
        return $this->FristTransaction;
    }

    /**
     * @return string
     */
    public function getRecurringIndicator(): string
    {
        return $this->RecurringIndicator;
    }
}
