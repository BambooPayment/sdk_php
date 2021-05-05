<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class TransactionStep
 * Step of a transaction.
 */
class TransactionStep extends BambooPaymentObject
{
    /** @var string */
    private $Step;

    /** @var string */
    private $Created;

    /** @var string */
    private $Status;

    /** @var string */
    private $ResponseCode;

    /** @var string */
    private $ResponseMessage;

    /** @var string|null */
    private $Error;

    /** @var string */
    private $AuthorizationCode;

    /** @var string|null */
    private $UniqueId;

    /**
     * @return string
     */
    public function getStep(): string
    {
        return $this->Step;
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
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->ResponseCode;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->ResponseMessage;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->Error;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode(): string
    {
        return $this->AuthorizationCode;
    }

    /**
     * @return string|null
     */
    public function getUniqueId(): ?string
    {
        return $this->UniqueId;
    }
}
