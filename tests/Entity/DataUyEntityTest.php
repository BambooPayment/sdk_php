<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\DataUy;
use BambooPaymentTests\BaseTest;

class DataUyEntityTest extends BaseTest
{
    private const IS_FINAL_CONSUMER = 'IsFinalConsumer';
    private const INVOICE           = 'Invoice';
    private const TAXABLE_AMOUNT    = 'TaxableAmount';

    public function testHydrate(): void
    {
        $dataUy = new DataUy();
        $data   = $this->getDataOfDataUy();

        $dataUy = $dataUy->hydrate($data);

        self::assertInstanceOf(DataUy::class, $dataUy);
        self::assertEquals($data[self::IS_FINAL_CONSUMER], $dataUy->getIsFinalConsumer());
        self::assertEquals($data[self::INVOICE], $dataUy->getInvoice());
        self::assertEquals($data[self::TAXABLE_AMOUNT], $dataUy->getTaxableAmount());
    }

    private function getDataOfDataUy(): array
    {
        return [
            self::IS_FINAL_CONSUMER => true,
            self::INVOICE           => 1234,
            self::TAXABLE_AMOUNT    => '1234'
        ];
    }
}
