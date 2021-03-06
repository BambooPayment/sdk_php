<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class CountryDataUy
 * Object to store country data to Uruguay.
 */
class CountryDataUY extends BambooPaymentObject
{
    /** @var bool|null */
    private $IsFinalConsumer;

    /** @var string|null */
    private $Invoice;

    /** @var float|null */
    private $TaxableAmount;

    /**
     * @return bool|null
     */
    public function getIsFinalConsumer(): ?bool
    {
        return $this->IsFinalConsumer;
    }

    /**
     * @return string|null
     */
    public function getInvoice(): ?string
    {
        return $this->Invoice;
    }

    /**
     * @return float|null
     */
    public function getTaxableAmount(): ?float
    {
        return $this->TaxableAmount;
    }
}
