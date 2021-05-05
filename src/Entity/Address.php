<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Address
 * Adress of a customer.
 */
class Address extends BambooPaymentObject
{
    /** @var int */
    private $AddressId;

    /** @var int|null */
    private $AddressType;

    /** @var string|null */
    private $Country;

    /** @var string|null */
    private $State;

    /** @var string */
    private $AddressDetail;

    /** @var string|null */
    private $PostalCode;

    /** @var string|null */
    private $City;

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->AddressId;
    }

    /**
     * @return int|null
     */
    public function getAddressType(): ?int
    {
        return $this->AddressType;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->Country;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->State;
    }

    /**
     * @return string
     */
    public function getAddressDetail(): string
    {
        return $this->AddressDetail;
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->PostalCode;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->City;
    }
}
