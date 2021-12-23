<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class PaymentMethod.
 */
class PaymentMethod extends BambooPaymentObject
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var array */
    private $type;

    /** @var string|null */
    private $logoUrl;

    /** @var string */
    private $flow;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    /**
     * @return string
     */
    public function getFlow(): string
    {
        return $this->flow;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
