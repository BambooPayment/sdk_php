<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Account
 */
class Account extends BambooPaymentObject
{
    /** @var int */
    private $AccountId;

    /** @var string */
    private $Name;

    /** @var string */
    private $Phone;

    /** @var string */
    private $Created;

    /** @var string */
    private $Commerce;

    /** @var string */
    private $PrivateAcountKey;

    /** @var string */
    private $PrivateAccountKey;

    /*** @var Address */
    private $Address;

    /**
     * @return int
     */
    public function getAccountId(): int
    {
        return $this->AccountId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->Phone;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @return string
     */
    public function getCommerce(): string
    {
        return $this->Commerce;
    }

    /**
     * @return string
     */
    public function getPrivateAcountKey(): string
    {
        return $this->PrivateAcountKey;
    }

    /**
     * @return string
     */
    public function getPrivateAccountKey(): string
    {
        return $this->PrivateAccountKey;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->Address;
    }
}
