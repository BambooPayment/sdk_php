<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\CountryDataUY;
use BambooPaymentTests\SharedData;

/**
 * Class CountryDataUYEntityTest
 * @package BambooPaymentTests\Entity
 */
class CountryDataUYEntityTest extends SharedData
{
    /*** Entity attributes keys ***/
    public const IS_FINAL_CONSUMER = 'IsFinalConsumer';
    public const INVOICE           = 'Invoice';
    public const TAXABLE_AMOUNT    = 'TaxableAmount';

    public function testHydrate(): void
    {
        $dataUy = new CountryDataUY();
        $data   = $this->getDataOfDataUy();

        $dataUy = $dataUy->hydrate($data);

        $this->makeTestsOfDataOfDataUY($data, $dataUy);

    }

    private function makeTestsOfDataOfDataUY(array $data, CountryDataUY $dataUy): void
    {
        self::assertEquals($data[self::IS_FINAL_CONSUMER], $dataUy->getIsFinalConsumer());
        self::assertEquals($data[self::INVOICE], $dataUy->getInvoice());
        self::assertEquals($data[self::TAXABLE_AMOUNT], $dataUy->getTaxableAmount());
    }
}
