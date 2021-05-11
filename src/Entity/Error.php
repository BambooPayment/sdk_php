<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Address
 * Object to create list of errors.
 */
class Error extends BambooPaymentObject
{
    /** @var string */
    private $ErrorCode;

    /** @var string */
    private $Created;

    /** @var string */
    private $Message;

    /** @var string|null */
    private $Detail;

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->ErrorCode;
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
    public function getMessage(): string
    {
        return $this->Message;
    }

    /**
     * @return string|null
     */
    public function getDetail(): ?string
    {
        return $this->Detail;
    }
}
