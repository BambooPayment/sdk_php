<?php

namespace BambooPayment\Core;

use BambooPayment\Exception\ApiErrorException;
use BambooPayment\Exception\AuthenticationException;
use BambooPayment\Exception\InvalidRequestException;
use BambooPayment\Exception\UnknownApiErrorException;
use BambooPayment\HttpClient\HttpClient;
use Exception;
use Psr\Http\Message\ResponseInterface;
use function array_merge;
use function count;
use function is_array;

class ApiRequest
{
    /**
     * @var string
     */
    private string $method;

    /**
     * @var string
     */
    private string $absUrl;

    /**
     * @var array
     */
    private array $params;
    /**
     * @var array
     */
    private array $headers;

    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var HttpClient|null
     */
    private static ?HttpClient $_httpClient = null;

    /**
     * ApiRequest constructor.
     *
     * @param string $method
     * @param string $path
     * @param array $params
     * @param string $apiKey
     * @param string $apiBase
     * @param array $headers
     */
    public function __construct(string $method, string $path, array $params, string $apiKey, string $apiBase, array $headers)
    {
        $this->method  = $method;
        $this->params  = $params;
        $this->headers = $headers;
        $this->apiKey  = $apiKey;
        $this->absUrl  = $apiBase . $path;
    }

    public function request(): ApiResponse
    {
        $response = $this->makeRequest($this->method, $this->absUrl, $this->params, $this->headers);

        return new ApiResponse($response->getBody(), $response->getStatusCode(), $response->getHeaders());
    }

    /**f
     * @static
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

        return $body[BambooPaymentClient::ARRAY_RESULT_KEY];
    }

    /**
     * @param array|null $body
     * @param int $code
     *
     * @throws UnknownApiErrorException|ApiErrorException|AuthenticationException|InvalidRequestException
     */
    private function handleErrorResponse(?array $body, int $code): void
    {
        $errorHandler = new ErrorHandler();
        try {
            if ($code < 200 || $code > 300) {
                throw new InvalidRequestException('Invalid API route or response', $code, $body, null, null);
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
        if (! self::$_httpClient instanceof HttpClient) {
            self::$_httpClient = HttpClient::instance();
        }

        return self::$_httpClient;
    }
}
