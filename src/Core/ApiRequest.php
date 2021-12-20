<?php

namespace BambooPayment\Core;

use BambooPayment\HttpClient\HttpClient;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;
use Psr\Http\Message\ResponseInterface;
use function array_merge;

class ApiRequest
{
    private $method;
    private $absUrl;
    private $params;
    private $headers;
    private $apiKey;
    private $responseInterpreter;
    private $resultKey;
    private static $httpClient;

    /**
     * ApiRequest constructor.
     *
     * @param string $method
     * @param string $path
     * @param array $params
     * @param string $apiKey
     * @param string $apiBase
     * @param array $headers
     * @param \BambooPayment\ResponseInterpreter\ResponseInterpreterInterface $responseInterpreter
     */
    public function __construct(
        string $method,
        string $path,
        array $params,
        string $apiKey,
        string $apiBase,
        array $headers,
        ResponseInterpreterInterface $responseInterpreter,
        ?string $resultKey = null
    ) {
        $this->method              = $method;
        $this->params              = $params;
        $this->headers             = $headers;
        $this->apiKey              = $apiKey;
        $this->absUrl              = $apiBase . $path;
        $this->responseInterpreter = $responseInterpreter;
        $this->resultKey           = $resultKey;
    }

    /**
     * Make a request.
     *
     * @return ApiResponse
     */
    public function request(): ApiResponse
    {
        $response = $this->makeRequest($this->method, $this->absUrl, $this->params, $this->headers);

        return new ApiResponse($response->getBody(), $response->getStatusCode(), $response->getHeaders(), $this->resultKey);
    }

    /**
     * Get default headers.
     *
     * @param string $apiKey
     *
     * @return array
     */
    private function defaultHeaders(string $apiKey): array
    {
        return [
            'Authorization' => 'Basic ' . $apiKey,
            'Content-Type'  => 'application/json'
        ];
    }

    /**
     * Make a request to the API.
     *
     * @param string $method
     * @param string $absUrl
     * @param array $params
     * @param array $headers
     *
     * @return ResponseInterface
     */
    private function makeRequest(string $method, string $absUrl, array $params, array $headers): ResponseInterface
    {
        $defaultHeaders  = $this->defaultHeaders($this->apiKey);
        $combinedHeaders = array_merge($defaultHeaders, $headers);

        return $this->httpClient()->request(
            $method,
            $absUrl,
            $combinedHeaders,
            $params
        );
    }

    /**
     * @return HttpClient
     */
    public function httpClient(): HttpClient
    {
        if (! self::$httpClient instanceof HttpClient) {
            self::$httpClient = HttpClient::instance();
        }

        return self::$httpClient;
    }

    /**
     * @return ResponseInterpreterInterface
     */
    public function getApiInterpreterResponse(): ResponseInterpreterInterface
    {
        return $this->responseInterpreter;
    }
}
