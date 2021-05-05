<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class CardData
 * Object Data to Card.
 */
class CardData extends BambooPaymentObject
{
    /** @var string */
    private $CardholderName;

    /** @var string */
    private $Pan;

    /** @var string */
    private $CVV;

    /** @var string */
    private $Expiration;

    /** @var string */
    private $Email;

    /** @var string|null */
    private $Document;

    /**
     * @return string
     */
    public function getCardholderName(): string
    {
        return $this->CardholderName;
    }

    /**
     * @return string
     */
    public function getPan(): string
    {
        return $this->Pan;
    }

    /**
     * @return string
     */
    public function getCVV(): string
    {
        return $this->CVV;
    }

    /**
     * @return string
     */
    public function getExpiration(): string
    {
        return $this->Expiration;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @return string|null
     */
    public function getDocument(): ?string
    {
        return $this->Document;
    }
}
