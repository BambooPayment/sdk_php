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

    /** @var string */
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
     * @param string $Step
     */
    public function setStep(string $Step): void
    {
        $this->Step = $Step;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @param string $Created
     */
    public function setCreated(string $Created): void
    {
        $this->Created = $Created;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     */
    public function setStatus(string $Status): void
    {
        $this->Status = $Status;
    }

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->ResponseCode;
    }

    /**
     * @param string $ResponseCode
     */
    public function setResponseCode(string $ResponseCode): void
    {
        $this->ResponseCode = $ResponseCode;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->ResponseMessage;
    }

    /**
     * @param string $ResponseMessage
     */
    public function setResponseMessage(string $ResponseMessage): void
    {
        $this->ResponseMessage = $ResponseMessage;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->Error;
    }

    /**
     * @param string $Error
     */
    public function setError(string $Error): void
    {
        $this->Error = $Error;
    }

    /**
     * @return string
     */
    public function getAuthorizationCode(): string
    {
        return $this->AuthorizationCode;
    }

    /**
     * @param string $AuthorizationCode
     */
    public function setAuthorizationCode(string $AuthorizationCode): void
    {
        $this->AuthorizationCode = $AuthorizationCode;
    }

    /**
     * @return string|null
     */
    public function getUniqueId(): ?string
    {
        return $this->UniqueId;
    }

    /**
     * @param string|null $UniqueId
     */
    public function setUniqueId(?string $UniqueId): void
    {
        $this->UniqueId = $UniqueId;
    }
}
