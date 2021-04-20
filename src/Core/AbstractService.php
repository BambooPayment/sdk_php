<?php

namespace BambooPayment\Core;

use BambooPayment\Entity\BambooPaymentObject;
use function is_array;

abstract class AbstractService
{
    protected BambooPaymentClient $client;

    public function __construct(BambooPaymentClient $client)
    {
        $this->client = $client;
    }

    public function create(?array $params = null): BambooPaymentObject
    {
        return $this->request('post', $this->getBaseUri(), $params);
    }

    public function delete(int $id, ?array $params = null): BambooPaymentObject
    {
        return $this->request('delete', sprintf($this->getBaseUri() . '/%s', $id), $params);
    }

    public function fetch(int $id): BambooPaymentObject
    {
        return $this->request('get', sprintf($this->getBaseUri() . '/%s', $id));
    }

    public function update(int $id, ?array $params = null): BambooPaymentObject
    {
        return $this->request('post', sprintf($this->getBaseUri() . '/%s/update', $id), $params);
    }

    public function all(array $params = []): array
    {
        return $this->requestCollection($this->getBaseUri(), $params);
    }

    /**
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    protected function request(
        string $method,
        string $path,
        ?array $params = null
    ): BambooPaymentObject {
        $response = $this->client->request($this->client->createApiRequest($method, $path, $params));

        return $this->convertToBambooPaymentObject($response);
    }

    protected function requestCollection(
        string $path,
        ?array $params = null
    ): array {
        $response = $this->client->request($this->client->createApiRequest('get', $path, $params));

        $result = [];
        foreach ($response as $item) {
            if (is_array($item)) {
                $result[] = $this->convertToBambooPaymentObject($item);
            }
        }

        return $result;
    }

    protected function convertToBambooPaymentObject(array $response): ?BambooPaymentObject
    {
        $class  = $this->getEntityClass();
        $object = new $class();
        if ($object instanceof BambooPaymentObject) {
            return $object->hydrate($response);
        }

        return null;
    }

    abstract public function getEntityClass(): string;

    abstract public function getBaseUri(): string;
}
