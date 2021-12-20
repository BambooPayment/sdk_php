<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\BambooPaymentClient;
use PHPUnit\Framework\TestCase;

class AbstractServiceTest extends TestCase
{
    public function testHydrateWithNonExistent(): void
    {
        $bambooPaymentClient = $this->createMock(BambooPaymentClient::class);
        $service             = new DummyService($bambooPaymentClient);

        self::expectExceptionMessage('The class BambooPaymentTests\Core\DummyBambooObject does not exists');
        $service->convertToBambooPaymentObject([]);
    }

}
