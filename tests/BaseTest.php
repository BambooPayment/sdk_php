<?php

namespace BambooPaymentTests;

use BambooPayment\Core\ApiRequest;
use BambooPayment\Core\ApiResponse;
use BambooPayment\Core\BambooPaymentClient;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    public function mockApiRequest(string $filename, string $endpoint, $statusCode = null): ApiRequest
    {
        if ($statusCode === null) {
            $statusCode = 200;
        }

        $apiRequest = $this->createPartialMock(ApiRequest::class, ['request']);
        $apiRequest->method('request')->willReturn(new ApiResponse($this->getMockData($filename, $endpoint), $statusCode));

        return $apiRequest;
    }

    public function createBambooClientWithApiRequestMocked(string $filename, string $endpoint, $statusCode = null): BambooPaymentClient
    {
        $bambooPaymentClient = $this->createPartialMock(BambooPaymentClient::class, ['createApiRequest']);
        $bambooPaymentClient->method('createApiRequest')->willReturn($this->mockApiRequest($filename, $endpoint, $statusCode));

        return $bambooPaymentClient;
    }

    /**
     * @throws \JsonException
     */
    public function getMockData($filename, $endpoint): ?string
    {
        $data     = null;
        $filename = __DIR__ . '/Data/' . $filename . '.json';
        if (\file_exists($filename)) {
            $mockFile = \json_decode(\file_get_contents($filename), true, 512, JSON_THROW_ON_ERROR);
            $data     = $mockFile[$endpoint]['data'];
        }

        return $data;
    }
}
