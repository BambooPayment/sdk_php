<?php

namespace BambooPaymentTests\Service;

use BambooPayment\Entity\CountryPaymentMethod;
use BambooPayment\Entity\PaymentMethod;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\Service\CountryPaymentMethodService;
use BambooPaymentTests\BaseTest;

class CountryPaymentMethodServiceTest extends BaseTest
{
    public function testFetchAllPaymentMethods(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('all');
        $service             = new CountryPaymentMethodService($bambooPaymentClient);

        $countryPaymentMethods = $service->fetchPaymentMethods();
        self::assertCount(1, $countryPaymentMethods);


        $countryPaymentMethod = $countryPaymentMethods[0];
        self::assertInstanceOf(CountryPaymentMethod::class, $countryPaymentMethod);
        self::assertEquals('Uruguay', $countryPaymentMethod->getName());
        self::assertEquals('https://s3.amazonaws.com/gateway.dev.bamboopayment.com/country-flags/uy.svg', $countryPaymentMethod->getFlagUrl());
        self::assertEquals('UY', $countryPaymentMethod->getIsoCode());
        self::assertEquals('UYU', $countryPaymentMethod->getLocalCurrency()['iso']);

        $paymentMethods = $countryPaymentMethod->getPaymentMethods();
        self::assertCount(11, $paymentMethods);

        $paymentMethod = $paymentMethods[0];
        self::assertInstanceOf(PaymentMethod::class, $paymentMethod);
        self::assertEquals(1, $paymentMethod->getId());
        self::assertEquals('VISA', $paymentMethod->getName());
        self::assertEquals('common', $paymentMethod->getFlow());
        self::assertEquals('https://s3.amazonaws.com/gateway.dev.bamboopayment.com/payment-method-logos/1_visa_2.png', $paymentMethod->getLogoUrl());

        $type = $paymentMethod->getType();
        self::assertIsArray($type);
        self::assertEquals(1, $type['id']);
        self::assertEquals('CreditCard', $type['name']);
        self::assertEquals('Tarjeta de Credito', $type['description']);
    }

    private function createBambooPaymentClient($endpoint, $statusCode = null): \BambooPayment\Core\BambooPaymentClient
    {
        return $this->createBambooClientWithApiRequestMocked(
            'country-payment-methods',
            $endpoint,
            $statusCode,
            new ResponseInterpreterCheckoutPro(),
            'countryPaymentMethods'
        );
    }
}
