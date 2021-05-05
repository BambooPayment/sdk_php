<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class CustomerActivation
 * Activation of a customer.
 */
class CustomerActivation extends BambooPaymentObject
{
    /** @var string */
    private $Token;

    /** @var string */
    private $ActivationCode;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->Token;
    }

    /**
     * @return string
     */
    public function getActivationCode(): string
    {
        return $this->ActivationCode;
    }
}
