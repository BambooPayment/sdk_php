<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class DataUy
 * Object Data to Uruguay.
 */
class DataUy extends BambooPaymentObject
{
    /** @var bool */
    private $IsFinalConsumer;

    /** @var string */
    private $Invoice;

    /** @var string */
    private $TaxableAmount;

    /**
     * @return bool
     */
    public function getIsFinalConsumer(): bool
    {
        return $this->IsFinalConsumer;
    }

    /**
     * @param bool $IsFinalConsumer
     */
    public function setIsFinalConsumer(bool $IsFinalConsumer): void
    {
        $this->IsFinalConsumer = $IsFinalConsumer;
    }

    /**
     * @return string
     */
    public function getInvoice(): string
    {
        return $this->Invoice;
    }

    /**
     * @param string $Invoice
     */
    public function setInvoice(string $Invoice): void
    {
        $this->Invoice = $Invoice;
    }

    /**
     * @return string
     */
    public function getTaxableAmount(): string
    {
        return $this->TaxableAmount;
    }

    /**
     * @param string $TaxableAmount
     */
    public function setTaxableAmount(string $TaxableAmount): void
    {
        $this->TaxableAmount = $TaxableAmount;
    }
}
