<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class CountryDataDo
 * Object to store country data to Rep. Dominicana.
 */
class CountryDataDo extends BambooPaymentObject
{
    /** @var string|null */
    private $Invoice;

    /** @var string|null */
    private $Tax;

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
    public function getTax(): ?string
    {
        return $this->Tax;
    }
}
