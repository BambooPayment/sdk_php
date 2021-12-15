<?php

namespace BambooPaymentTests;

use BambooPayment\Core\ApiRequest;
use BambooPayment\Core\ApiResponse;
use BambooPayment\Core\BambooPaymentClient;
use PHPUnit\Framework\TestCase;
use function file_exists;
use function file_get_contents;
use function json_decode;

abstract class BaseTest extends TestCase
{
    /**
     * @param string $filename
     * @param string $endpoint
     * @param int|null $statusCode
     * @return ApiRequest
     */
    public function mockApiRequest(string $filename, string $endpoint, int $statusCode = null): ApiRequest
    {
        if ($statusCode === null) {
            $statusCode = 200;
        }

        $apiRequest = $this->createPartialMock(ApiRequest::class, ['request']);
        $apiRequest->method('request')->willReturn(new ApiResponse($this->getMockData($filename, $endpoint), $statusCode));

        return $apiRequest;
    }

    /**
     * @param string $filename
     * @param string $endpoint
     * @param int|null $statusCode
     * @return BambooPaymentClient
     * @throws JsonException
     */
    public function createBambooClientWithApiRequestMocked(string $filename, string $endpoint, int $statusCode = null): BambooPaymentClient
    {
        $bambooPaymentClient = $this->createPartialMock(BambooPaymentClient::class, ['createApiRequest']);
        $bambooPaymentClient->method('createApiRequest')->willReturn($this->mockApiRequest($filename, $endpoint, $statusCode));

        return $bambooPaymentClient;
    }

    /**
     * @param string $filename
     * @param string $endpoint
     * @return string|null
     * @throws JsonException
     */
    public function getMockData(string $filename, string $endpoint): ?string
    {
        $data     = null;
        $filename = __DIR__ . '/Data/' . $filename . '.json';
        if (file_exists($filename)) {
            $fileContent = file_get_contents($filename);
            if ($fileContent !== false) {
                $mockFile = json_decode($fileContent, true);
                $data     = $mockFile[$endpoint]['data'];
            }
        }

        return $data;
    }
}
