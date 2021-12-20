<?php

namespace BambooPaymentTests\Service;

use BambooPayment\Entity\Country;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\Service\CountryService;
use BambooPaymentTests\BaseTest;

class CountryServiceTest extends BaseTest
{
    public function testGetAllCountries(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('all', 'countries');
        $service             = new CountryService($bambooPaymentClient);

        self::assertCount(3, $service->all());
    }

    public function testFetchCountry(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('fetch', 'country');
        $service             = new CountryService($bambooPaymentClient);

        $country = $service->fetch(1);

        self::assertInstanceOf(Country::class, $country);
        self::assertEquals(1, $country->getId());
        self::assertEquals('Uruguay', $country->getName());
    }

    private function createBambooPaymentClient($endpoint, ?string $keyResponse = null, $statusCode = null): \BambooPayment\Core\BambooPaymentClient
    {
        return $this->createBambooClientWithApiRequestMocked(
            'countries',
            $endpoint,
            $statusCode,
            new ResponseInterpreterCheckoutPro(),
            $keyResponse
        );
    }
}
