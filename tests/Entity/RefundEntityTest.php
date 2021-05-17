<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\RefundData;
use BambooPaymentTests\BaseTest;

/**
 * Class RefundEntityTest
 * @package BambooPaymentTests\Entity
 */
class RefundEntityTest extends BaseTest
{
    private const PURCHASE_REFUND_ID = 'PurchaseRefundId';
    private const CREATED            = 'Created';
    private const UNIQUE_ID          = 'UniqueID';
    private const AMOUNT             = 'Amount';
    private const CURRENCY           = 'Currency';
    private const STATUS             = 'Status';


    public function testHydrate(): void
    {
        $refund = new RefundData();
        $data   = $this->getDataOfRefund();

        /** @var RefundData $refund */
        $refund = $refund->hydrate($data);

        self::assertEquals($data[self::PURCHASE_REFUND_ID], $refund->getPurchaseRefundId());
        self::assertEquals($data[self::CREATED], $refund->getCreated());
        self::assertNull($refund->getUniqueID());
        self::assertEquals($data[self::AMOUNT], $refund->getAmount());
        self::assertEquals($data[self::CURRENCY], $refund->getCurrency());
        self::assertEquals($data[self::STATUS], $refund->getStatus());
    }

    private function getDataOfRefund(): array
    {
        return [
            self::PURCHASE_REFUND_ID => 90536,
            self::CREATED            => '2021-04-15T16:14:32.123',
            self::UNIQUE_ID          => null,
            self::AMOUNT             => 50,
            self::CURRENCY           => 'UYU',
            self::STATUS             => 'Approved'
        ];
    }
}
