<?php

namespace BambooPayment\Core;

use BambooPayment\Exception\ApiErrorException;
use BambooPayment\Exception\AuthenticationException;
use BambooPayment\Exception\InvalidRequestException;
use BambooPayment\Exception\UnknownApiErrorException;
use BambooPayment\HttpClient\HttpClient;
use Exception;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use function array_merge;
use function count;
use function is_array;

class ApiRequest
{
    private const STATUS_CODE_200 = 200;
    private const STATUS_CODE_201 = 201;
    private const STATUS_CODE_422 = 422;

    private string             $method;

    private string             $absUrl;

    private array              $params;

    private array              $headers;

    private string             $apiKey;

    private static ?HttpClient $httpClient = null;

    /**
     * ApiRequest constructor.
     * @param string $method
     * @param string $path
     * @param array  $params
     * @param string $apiKey
     * @param string $apiBase
     * @param array  $headers
     */
    public function __construct(
        string $method,
        string $path,
        array $params,
        string $apiKey,
        string $apiBase,
        array $headers
    ) {
        $this->method  = $method;
        $this->params  = $params;
        $this->headers = $headers;
        $this->apiKey  = $apiKey;
        $this->absUrl  = $apiBase . $path;
    }

    /**
     * Make a request.
     *
     * @return ApiResponse
     */
    public function request(): ApiResponse
    {
        $response = $this->makeRequest($this->method, $this->absUrl, $this->params, $this->headers);

        return new ApiResponse($response->getBody(), $response->getStatusCode(), $response->getHeaders());
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
     * @param array  $params
     * @param array  $headers
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
     * Return the data from the API response or throw an error.
     *
     * @param ApiResponse $apiResponse
     *
     * @return array
     *
     * @throws ApiErrorException
     * @throws AuthenticationException
     * @throws InvalidRequestException
     * @throws UnknownApiErrorException
     */
    public function interpretResponse(ApiResponse $apiResponse): array
    {
        $body = $apiResponse->json;
        $code = $apiResponse->code;

        $this->handleErrorResponse($body, $code);

        return $body[BambooPaymentClient::ARRAY_RESULT_KEY] ?? [];
    }

    /**
     * Check for a error in the API response and throw a Exception if it is needed.
     *
     * @param array|null $body
     * @param int        $code
     *
     * @throws UnknownApiErrorException|ApiErrorException|AuthenticationException|InvalidRequestException
     */
    private function handleErrorResponse(?array $body, int $code): void
    {
        $errorHandler = new ErrorHandler();
        try {
            if ($code < 200 || $code > 503) {
                throw new InvalidRequestException('Invalid API route or response', $code, $body, null, null);
            }

            if ($code !== self::STATUS_CODE_200
                || $code !== self::STATUS_CODE_201) {
                throw new RuntimeException('Internal error', self::STATUS_CODE_422);
            }

            $errorData = $body[BambooPaymentClient::ARRAY_ERROR_KEY] ?? null;
            if (is_array($errorData) && count($errorData) > 0) {
                $errorHandler->handleErrorResponse($body, $code);
            }
        } catch (Exception $e) {
            throw $e;
        }
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
}
