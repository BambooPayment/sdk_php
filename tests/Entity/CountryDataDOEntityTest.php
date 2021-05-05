<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\CountryDataDO;
use BambooPaymentTests\BaseTest;

class CountryDataDOEntityTest extends BaseTest
{
    private const INVOICE = 'Invoice';
    private const TAX     = 'Tax';

    public function testHydrate(): void
    {
        $dataDo = new CountryDataDO();
        $data   = $this->getDataOfDataDo();

        $dataDo = $dataDo->hydrate($data);

        self::assertInstanceOf(CountryDataDO::class, $dataDo);
        self::assertEquals($data[self::INVOICE], $dataDo->getInvoice());
        self::assertEquals($data[self::TAX], $dataDo->getTax());
    }

    private function getDataOfDataDo(): array
    {
        return [
            self::INVOICE => 1200,
            self::TAX     => '100'
        ];
    }
}
