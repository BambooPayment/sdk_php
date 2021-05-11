<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class TokenInfo
 */
class TokenInfo extends BambooPaymentObject
{
    /** @var string */
    private $TokenId;

    /** @var string */
    private $Created;

    /** @var string */
    private $Type;

    /** @var string */
    private $Brand;

    /** @var string */
    private $IssueBank;

    /** @var string */
    private $Owner;

    /** @var string */
    private $Last4;

    /** @var string */
    private $CardType;

    /** @var string */
    private $CardExpMonth;

    /** @var string */
    private $CardExpYear;

    /**
     * @return string
     */
    public function getTokenId(): string
    {
        return $this->TokenId;
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
    public function getType(): string
    {
        return $this->Type;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->Brand;
    }

    /**
     * @return string
     */
    public function getIssueBank(): string
    {
        return $this->IssueBank;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->Owner;
    }

    /**
     * @return string
     */
    public function getLast4(): string
    {
        return $this->Last4;
    }

    /**
     * @return string
     */
    public function getCardType(): string
    {
        return $this->CardType;
    }

    /**
     * @return string
     */
    public function getCardExpMonth(): string
    {
        return $this->CardExpMonth;
    }

    /**
     * @return string
     */
    public function getCardExpYear(): string
    {
        return $this->CardExpYear;
    }
}
