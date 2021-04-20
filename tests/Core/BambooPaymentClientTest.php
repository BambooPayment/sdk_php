<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\ApiRequest;
use BambooPayment\Core\BambooPaymentClient;
use BambooPayment\Service\CustomerService;
use PHPUnit\Framework\TestCase;

class BambooPaymentClientTest extends TestCase
{
    public function testCreateWithoutKey(): void
    {
        $this->expectExceptionMessage('Must provide a api key');
        new BambooPaymentClient([]);
    }

    public function testProductionConfig(): void
    {
        $bambooPaymentClient = new BambooPaymentClient(
            [
                'api_key' => '123456'
            ]
        );

        self::assertEquals('https://api.siemprepago.com/', $bambooPaymentClient->getApiBase());
    }

    public function testTestingConfig(): void
    {
        $bambooPaymentClient = new BambooPaymentClient(
            [
                'api_key' => '123456',
                'testing' => true
            ]
        );

        self::assertEquals('https://testapi.siemprepago.com/', $bambooPaymentClient->getApiBase());
    }

    public function testValidateConfigWithApiKeyInteger(): void
    {
        $this->expectExceptionMessage('api_key must be a string');
        new BambooPaymentClient(
            [
                'api_key' => 23423423
            ]
        );
    }

    public function testValidateConfigWithApiKeyWithSpaces(): void
    {
        $this->expectExceptionMessage('api_key cannot contain whitespace');
        new BambooPaymentClient(
            [
                'api_key' => 'asdasd as sadasd dasdas'
            ]
        );
    }

    public function testCreateApiRequestWithGetMethod(): void
    {
        $bambooPaymentClient = new BambooPaymentClient(
            [
                'api_key' => '123456',
                'testing' => true
            ]
        );

        $apiRequestExpected = new ApiRequest('get', '/', [], '123456', 'https://testapi.siemprepago.com/', []);

        self::assertEquals($apiRequestExpected, $bambooPaymentClient->createApiRequest('get', '/'));
    }

    public function testCreateApiRequestWithPostMethod(): void
    {
        $bambooPaymentClient = new BambooPaymentClient(
            [
                'api_key' => '123456',
                'testing' => true
            ]
        );

        $apiRequestExpected = new ApiRequest('post', '/aaa', [], '123456', 'https://testapi.siemprepago.com/', []);

        self::assertEquals($apiRequestExpected, $bambooPaymentClient->createApiRequest('post', '/aaa'));
    }

    public function testGetService(): void
    {
        $bambooPaymentClient = new BambooPaymentClient(
            [
                'api_key' => '123456',
                'testing' => true
            ]
        );

        /* @phpstan-ignore-next-line */
        self::assertInstanceOf(CustomerService::class, $bambooPaymentClient->customers);
    }

    public function testGetServiceWithNonExistent(): void
    {
        $bambooPaymentClient = new BambooPaymentClient(
            [
                'api_key' => '123456',
                'testing' => true
            ]
        );

        /* @phpstan-ignore-next-line */
        self::assertNull($bambooPaymentClient->aaa);
    }
}
