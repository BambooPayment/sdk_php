<?php

namespace BambooPayment\Core;

use BambooPayment\Exception\InvalidArgumentException;
use function is_string;
use function preg_match;

/**
 * Client used to send requests to BambooPayment's API.
 */
class BambooPaymentClient
{
    private const DEFAULT_API_BASE         = 'https://api.siemprepago.com/';
    private const DEFAULT_API_TESTING_BASE = 'https://testapi.siemprepago.com/';
    public const  ARRAY_ERROR_KEY          = 'Errors';
    public const  ARRAY_RESULT_KEY         = 'Response';

    private ?CoreServiceFactory $coreServiceFactory = null;
    private array $config;

    /** * @var AbstractService|AbstractServiceFactory|null */
    private $data;

    /**
     * BambooPaymentClient constructor.
     * testing: if it is true, the api_base is the testing url.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        if (! isset($config['api_key'])) {
            throw new InvalidArgumentException('Must provide a api key');
        }

        $config['api_base'] = self::DEFAULT_API_BASE;

        $isTestingMode = $config['testing'] ?? false;
        if ($isTestingMode) {
            $config['api_base'] = self::DEFAULT_API_TESTING_BASE;
        }

        $this->validateConfig($config);
        $this->config = $config;
    }

    /**
     * Gets the API key used by the client to send requests.
     *
     * @return string the API key used by the client to send requests
     */
    public function getApiKey(): string
    {
        return $this->config['api_key'];
    }

    /**
     * Gets the base URL for BambooPayment's API.
     *
     * @return string the base URL for BambooPayment's API
     */
    public function getApiBase(): string
    {
        return $this->config['api_base'];
    }

    /**
     * Send a request to the API and return an array of data.
     *
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function request(ApiRequest $apiRequest): array
    {
        $apiResponse = $apiRequest->request();

        return $apiRequest->interpretResponse($apiResponse);
    }

    /**
     * Check that the api_key is present.
     *
     * @param array $config
     */
    private function validateConfig(array $config): void
    {
        $msg = null;
        if (! is_string($config['api_key'])) {
            $msg = 'api_key must be a string';
        }

        if (preg_match('/\s/', $config['api_key'])) {
            $msg = 'api_key cannot contain whitespace';
        }

        if ($msg !== null) {
            throw new InvalidArgumentException($msg);
        }
    }

    /**
     * Return a service from the array of services.
     *
     * @param string $name
     *
     * @return \BambooPayment\Core\AbstractService|\BambooPayment\Core\AbstractServiceFactory|null
     */
    public function __get(string $name)
    {
        if (! $this->coreServiceFactory instanceof CoreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }

    /**
     * @codeCoverageIgnore
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @codeCoverageIgnore
     */
    public function __isset($name): bool
    {
        return isset($this->data[$name]);
    }

    /**
     * Create an ApiRequest to make request to the API.
     *
     * @param string $method
     * @param string $path
     * @param array|null $params
     *
     * @return ApiRequest
     */
    public function createApiRequest(string $method, string $path, ?array $params = null): ApiRequest
    {
        if ($params === null) {
            $params = [];
        }

        return new ApiRequest($method, $path, $params, $this->getApiKey(), $this->getApiBase(), []);
    }
}
