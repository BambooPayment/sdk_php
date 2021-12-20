<?php

namespace BambooPaymentTests\Service;

use BambooPayment\Entity\Payment;
use BambooPayment\Entity\PaymentRefund;
use BambooPayment\Entity\PaymentStatus;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\Service\PaymentRefundService;
use BambooPayment\Service\PaymentService;
use BambooPayment\Service\PaymentStatusService;
use BambooPaymentTests\BaseTest;

class PaymentServiceTest extends BaseTest
{
    public function testCreatePurchase(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('create');
        $service             = new PaymentService($bambooPaymentClient);

        $payment = $service->create();

        self::assertInstanceOf(Payment::class, $payment);
        self::assertTrue($payment->isSuccess());
    }

    public function testFetchPurchaseStatus(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('payment-status');
        $service             = new PaymentStatusService($bambooPaymentClient);

        $payment = $service->fetch('49e236e6-c0c4-40ae-9fea-3533c06770ca');
        self::assertInstanceOf(PaymentStatus::class, $payment);
        self::assertEquals(123789, $payment->getPurchaseId());
        self::assertEquals('completed', $payment->getPaymentStatus());
        self::assertEquals('approved', $payment->getTransactionStatus());
    }

    private function createBambooPaymentClient($endpoint, ?string $keyResponse = null, $statusCode = null): \BambooPayment\Core\BambooPaymentClient
    {
        return $this->createBambooClientWithApiRequestMocked(
            'payments',
            $endpoint,
            $statusCode,
            new ResponseInterpreterCheckoutPro(),
            $keyResponse
        );
    }

    public function testRefund(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('refund');
        $service             = new PaymentRefundService($bambooPaymentClient);

        $paymentRefund = $service->refund('49e236e6-c0c4-40ae-9fea-3533c06770ca', 100);

        self::assertInstanceOf(PaymentRefund::class, $paymentRefund);
        self::assertEquals('success', $paymentRefund->getStatus());
    }
}
