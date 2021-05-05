<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class CountryDataUy
 * Object to store country data to Uruguay.
 */
class CountryDataUy extends BambooPaymentObject
{
    /** @var bool|null */
    private $IsFinalConsumer;

    /** @var string|null */
    private $Invoice;

    /** @var string|null */
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
     * @return string|null
     */
    public function getTaxableAmount(): ?string
    {
        return $this->TaxableAmount;
    }
}
