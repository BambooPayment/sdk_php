<?php

namespace BambooPaymentTests;

use BambooPayment\Core\ApiRequest;
use BambooPayment\Core\ApiResponse;
use BambooPayment\Core\BambooPaymentClient;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;
use BambooPayment\ResponseInterpreter\ResponseInterpreterPCI;
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
     * @param \BambooPayment\ResponseInterpreter\ResponseInterpreterInterface|null $responseInterpreter
     * @return ApiRequest
     */
    public function mockApiRequest(
        string $filename,
        string $endpoint,
        int $statusCode = null,
        ?ResponseInterpreterInterface $responseInterpreter = null,
        ?string $resultKey = null
    ): ApiRequest {
        if ($statusCode === null) {
            $statusCode = 200;
        }

        $apiRequest = $this->createPartialMock(ApiRequest::class, ['request', 'getApiInterpreterResponse']);
        $apiRequest->method('request')->willReturn(new ApiResponse($this->getMockData($filename, $endpoint), $statusCode, [], $resultKey));
        $responseInterpreterClass = new ResponseInterpreterPCI();
        if ($responseInterpreter instanceof ResponseInterpreterInterface) {
            $responseInterpreterClass = $responseInterpreter;
        }
        $apiRequest->method('getApiInterpreterResponse')->willReturn($responseInterpreterClass);

        return $apiRequest;
    }

    /**
     * @param string $filename
     * @param string $endpoint
     * @param int|null $statusCode
     * @param \BambooPayment\ResponseInterpreter\ResponseInterpreterInterface|null $responseInterpreter
     * @return BambooPaymentClient
     */
    public function createBambooClientWithApiRequestMocked(
        string $filename,
        string $endpoint,
        int $statusCode = null,
        ?ResponseInterpreterInterface $responseInterpreter = null,
        ?string $resultKey = null
    ): BambooPaymentClient {

        $bambooPaymentClient = $this->createPartialMock(BambooPaymentClient::class, ['createApiRequest']);
        $bambooPaymentClient->method('createApiRequest')->willReturn($this->mockApiRequest($filename, $endpoint, $statusCode, $responseInterpreter, $resultKey));

        return $bambooPaymentClient;
    }

    /**
     * @param string $filename
     * @param string $endpoint
     * @return string|null
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
