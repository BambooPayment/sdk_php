<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class PaymentProfile
 * Payment Profile of a customer.
 */
class PaymentProfile extends BambooPaymentObject
{
    /** @var int */
    private $PaymentProfileId;

    /** @var int */
    private $PaymentMediaId;

    /** @var string */
    private $Created;

    /** @var string|null */
    private $LastUpdate;

    /** @var string */
    private $Brand;

    /** @var string|null */
    private $CardOwner;

    /** @var null|string */
    private $Bin;

    /** @var string */
    private $IssuerBank;

    /** @var string */
    private $Installments;

    /** @var string */
    private $Type;

    /** @var int */
    private $IdCommerceToken;

    /** @var string|null */
    private $Token;

    /** @var string|null */
    private $Expiration;

    /** @var string */
    private $Last4;

    /** @var bool|null */
    private $Enabled;

    /** @var string|null */
    private $DocumentNumber;

    /** @var string|null */
    private $DocumentTypeId;

    /**
     * @return int
     */
    public function getPaymentProfileId(): int
    {
        return $this->PaymentProfileId;
    }

    /**
     * @return int
     */
    public function getPaymentMediaId(): int
    {
        return $this->PaymentMediaId;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @return string|null
     */
    public function getLastUpdate(): ?string
    {
        return $this->LastUpdate;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->Brand;
    }

    /**
     * @return string|null
     */
    public function getCardOwner(): ?string
    {
        return $this->CardOwner;
    }

    /**
     * @return string|null
     */
    public function getBin(): ?string
    {
        return $this->Bin;
    }

    /**
     * @return string
     */
    public function getIssuerBank(): string
    {
        return $this->IssuerBank;
    }

    /**
     * @return string
     */
    public function getInstallments(): string
    {
        return $this->Installments;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->Type;
    }

    /**
     * @return int
     */
    public function getIdCommerceToken(): int
    {
        return $this->IdCommerceToken;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->Token;
    }

    /**
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->Expiration;
    }

    /**
     * @return string
     */
    public function getLast4(): string
    {
        return $this->Last4;
    }

    /**
     * @return bool|null
     */
    public function isEnabled(): ?bool
    {
        return $this->Enabled;
    }

    /**
     * @return string|null
     */
    public function getDocumentNumber(): ?string
    {
        return $this->DocumentNumber;
    }

    /**
     * @return string|null
     */
    public function getDocumentTypeId(): ?string
    {
        return $this->DocumentTypeId;
    }
}
