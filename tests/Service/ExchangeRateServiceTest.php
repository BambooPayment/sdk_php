<?php

namespace BambooPaymentTests\Service;

use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\Service\ExchangeRateService;
use BambooPaymentTests\BaseTest;

class ExchangeRateServiceTest extends BaseTest
{
    public function testGetConversion(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('exchange-rate');
        $service             = new ExchangeRateService($bambooPaymentClient);

        self::assertEquals(98, $service->getConversion(100, 'AR')->getAmount());
    }

    private function createBambooPaymentClient($endpoint, $statusCode = null): \BambooPayment\Core\BambooPaymentClient
    {
        return $this->createBambooClientWithApiRequestMocked(
            'exchange-rate',
            $endpoint,
            $statusCode,
            new ResponseInterpreterCheckoutPro(),
            'amount'
        );
    }
}
