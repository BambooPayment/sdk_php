<?php

namespace BambooPaymentTests\Service;

use BambooPayment\Entity\Purchase;
use BambooPayment\Service\PurchaseService;
use BambooPaymentTests\BaseTest;

class PurchaseServiceTest extends BaseTest
{
    public function testCreatePurchase(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('purchases', 'create');
        $service             = new PurchaseService($bambooPaymentClient);

        $purchase = $service->create();

        self::assertInstanceOf(Purchase::class, $purchase);
        self::assertEquals(90335, $purchase->getPurchaseId());
    }

    public function testFetchPurchase(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('purchases', 'fetch');
        $service             = new PurchaseService($bambooPaymentClient);

        $purchase = $service->fetch(90511);
        self::assertInstanceOf(Purchase::class, $purchase);
        self::assertEquals(90511, $purchase->getPurchaseId());

        $customer = $purchase->getCustomer();
        self::assertEquals(53775, $customer->getCustomerId());
    }

    public function testRefund(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('purchases', 'refund');
        $service             = new PurchaseService($bambooPaymentClient);

        $purchase = $service->refund(90535);

        self::assertCount(1, $purchase->getRefundList());
    }

    public function testGetAllPurchases(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('purchases', 'all');
        $service             = new PurchaseService($bambooPaymentClient);

        self::assertCount(5, $service->all());
    }
}
