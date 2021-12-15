<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Account.
 */
class Account extends BambooPaymentObject
{
    public const ADDRESS = 'Address';

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
    private $PrivateAccountKey;

    /** @var string */
    private $PublicAccountKey;

    /** @var Address */
    private $Address;

    /**
     * @param array $data
     *
     * @return $this
     */
    public function hydrate(array $data): BambooPaymentObject
    {
        if (null !== $data[self::ADDRESS]) {
            $address             = new Address();
            $data[self::ADDRESS] = $address->hydrate($data[self::ADDRESS]);
        }

        return parent::hydrate($data);
    }

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
    public function getPrivateAccountKey(): string
    {
        return $this->PrivateAccountKey;
    }

    /**
     * @return string
     */
    public function getPublicAccountKey(): string
    {
        return $this->PublicAccountKey;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->Address;
    }
}
