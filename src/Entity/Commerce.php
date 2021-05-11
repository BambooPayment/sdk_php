<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Commerce
 */
class Commerce extends BambooPaymentObject
{
    /** @var int */
    private $CommerceID;

    /** @var string */
    private $Created;

    /** @var string */
    private $Name;

    /** @var string */
    private $LegalName;

    /** @var string */
    private $Document;

    /** @var string */
    private $DocumentType;

    /** @var Address */
    private $Address;

    /**
     * @return int
     */
    public function getCommerceID(): int
    {
        return $this->CommerceID;
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
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @return string
     */
    public function getLegalName(): string
    {
        return $this->LegalName;
    }

    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->Document;
    }

    /**
     * @return string
     */
    public function getDocumentType(): string
    {
        return $this->DocumentType;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->Address;
    }
}
