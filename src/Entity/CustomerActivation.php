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
     * @param string $Token
     */
    public function setToken(string $Token): void
    {
        $this->Token = $Token;
    }

    /**
     * @return string
     */
    public function getActivationCode(): string
    {
        return $this->ActivationCode;
    }

    /**
     * @param string $ActivationCode
     */
    public function setActivationCode(string $ActivationCode): void
    {
        $this->ActivationCode = $ActivationCode;
    }
}
