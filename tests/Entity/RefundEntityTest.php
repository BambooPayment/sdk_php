<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Refund;
use BambooPaymentTests\BaseTest;

class RefundEntityTest extends BaseTest
{
    public function testHydrate(): void
    {
        $refund = new Refund();

        /** @var Refund $refund */
        $refund = $refund->hydrate(
            [
                'PurchaseRefundId' => 90536,
                'Created'          => '2021-04-15T16:14:32.123',
                'UniqueID'         => null,
                'Amount'           => 50,
                'Currency'         => 'UYU',
                'Status'           => 'Approved'
            ]
        );

        self::assertEquals(90536, $refund->getPurchaseRefundId());
        self::assertEquals('2021-04-15T16:14:32.123', $refund->getCreated());
        self::assertNull($refund->getUniqueID());
        self::assertEquals(50, $refund->getAmount());
        self::assertEquals('UYU', $refund->getCurrency());
        self::assertEquals('Approved', $refund->getStatus());
    }
}
