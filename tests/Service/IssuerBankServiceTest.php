<?php

namespace BambooPaymentTests\Service;

use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\Service\IssuerBankService;
use BambooPaymentTests\BaseTest;

class IssuerBankServiceTest extends BaseTest
{
    public function testGetIssuersBanks(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('issuers-banks');
        $service             = new IssuerBankService($bambooPaymentClient);

        self::assertCount(12, $service->fetchDocumentTypesByCountry(1));
    }

    private function createBambooPaymentClient($endpoint, $statusCode = null): \BambooPayment\Core\BambooPaymentClient
    {
        return $this->createBambooClientWithApiRequestMocked(
            'issuers-banks',
            $endpoint,
            $statusCode,
            new ResponseInterpreterCheckoutPro(),
            'issuerBanks'
        );
    }
}
