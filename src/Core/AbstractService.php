<?php

namespace BambooPayment\Core;

use BambooPayment\Entity\BambooPaymentObject;
use BambooPayment\Exception\UnexpectedValueException;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;
use function is_array;

abstract class AbstractService
{
    protected const GET_METHOD  = 'get';
    protected const POST_METHOD = 'post';

    /**
     * @var \BambooPayment\Core\BambooPaymentClient
     */
    protected $client;

    /**
     * AbstractService constructor.
     *
     * @param \BambooPayment\Core\BambooPaymentClient $client
     */
    public function __construct(BambooPaymentClient $client)
    {
        $this->client = $client;
    }

    /**
     * Create resource.
     *
     * @param array|null $params
     *
     * @return \BambooPayment\Entity\BambooPaymentObject
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function create(?array $params = null): BambooPaymentObject
    {
        return $this->request(self::POST_METHOD, $this->getBaseUri(), $params);
    }

    /**
     * Fetch a resource by id.
     *
     * @param int $id
     *
     * @return \BambooPayment\Entity\BambooPaymentObject
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function fetch($id, ?string $resultKey = null): BambooPaymentObject
    {
        return $this->request(self::GET_METHOD, sprintf($this->getBaseUri() . '/%s', $id), [], $resultKey);
    }

    /**
     * Update resource.
     *
     * @param int $id
     * @param array|null $params
     *
     * @return \BambooPayment\Entity\BambooPaymentObject
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function update(int $id, ?array $params = null): BambooPaymentObject
    {
        return $this->request(self::POST_METHOD, sprintf($this->getBaseUri() . '/%s/update', $id), $params);
    }

    /**
     * Return a collection of resources.
     *
     * @param array $params
     * @param string|null $resultKey
     *
     * @return array
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function all(array $params = [], ?string $resultKey = null): array
    {
        return $this->requestCollection($this->getBaseUri(), $params, $resultKey);
    }

    /**
     * Make a request.
     *
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    protected function request(
        string $method,
        string $path,
        ?array $params = null,
        ?string $resultKey = null
    ): BambooPaymentObject {
        $response = $this->client->request($this->client->createApiRequest($method, $path, $this->getResponseInterpreter(), $params, $resultKey));

        return $this->convertToBambooPaymentObject($response);
    }

    /**
     * Return a collection of hydrated resources.
     *
     * @param string $path
     * @param array|null $params
     * @param string|null $resultKey
     *
     * @return array
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    protected function requestCollection(
        string $path,
        ?array $params = null,
        ?string $resultKey = null
    ): array {
        $apiRequest = $this->client->createApiRequest(self::GET_METHOD, $path, $this->getResponseInterpreter(), $params, $resultKey);
        $response   = $this->client->request($apiRequest);

        return $this->hydrateCollection($response, $resultKey);
    }

    private function hydrateCollection(array $response): array
    {
        $result = [];
        foreach ($response as $item) {
            if (is_array($item)) {
                $result[] = $this->convertToBambooPaymentObject($item);
            }
        }

        return $result;
    }

    /**
     * Hydrate a Bamboo Payment object with an array of data.
     *
     * @param array $response
     *
     * @return \BambooPayment\Entity\BambooPaymentObject|null
     */
    public function convertToBambooPaymentObject(array $response): BambooPaymentObject
    {
        return $this->createBambooClass()->hydrate($response);
    }

    private function createBambooClass(): BambooPaymentObject
    {
        $class  = $this->getEntityClass();
        $object = new $class();

        if ($object instanceof BambooPaymentObject) {
            return $object;
        }

        throw new UnexpectedValueException('The class ' . $class . ' does not exists');
    }

    /**
     * Return BambooPaymentObject class name.
     *
     * @return string
     */
    abstract public function getEntityClass(): string;

    /**
     * Return ResponseInterpreterInterface.
     *
     * @return \BambooPayment\ResponseInterpreter\ResponseInterpreterInterface
     */
    abstract public function getResponseInterpreter(): ResponseInterpreterInterface;

    /**
     * Get base uri of the resource.
     *
     * @return string
     */
    abstract public function getBaseUri(): string;
}
