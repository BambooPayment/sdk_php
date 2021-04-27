<?php

namespace BambooPayment\Core;

use function array_key_exists;

abstract class AbstractServiceFactory
{
    private BambooPaymentClient $client;

    /**
     * @var array<string, AbstractService|AbstractServiceFactory>
     */
    private array $services;

    /**
     * @var AbstractService|AbstractServiceFactory|null
     */
    private $data;

    /**
     * @param BambooPaymentClient $client
     */
    public function __construct(BambooPaymentClient $client)
    {
        $this->client   = $client;
        $this->services = [];
    }

    /**
     * Return service FQN.
     *
     * @param string $name
     *
     * @return null|string
     */
    abstract protected function getServiceClass(string $name): ?string;

    /**
     * Get service from the array of services loaded or instantiate one.
     *
     * @param string $name
     *
     * @return null|AbstractService|AbstractServiceFactory
     */
    public function __get(string $name)
    {
        $serviceClass = $this->getServiceClass($name);
        if ($serviceClass !== null) {
            if (! array_key_exists($name, $this->services)) {
                $this->services[$name] = new $serviceClass($this->client);
            }

            return $this->services[$name];
        }

        return null;
    }

    /**
     * @codeCoverageIgnore
     */
    public function __set($name, $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * @codeCoverageIgnore
     */
    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }
}
