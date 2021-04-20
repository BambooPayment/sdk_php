<?php

namespace BambooPayment\HttpClient;

use BambooPayment\Exception\UnexpectedValueException;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use function array_merge;
use function is_callable;
use function strtolower;

final class HttpClient
{
    protected static ?HttpClient $instance = null;

    public static function instance(): ?HttpClient
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected ClientInterface $client;

    /**
     * @param \GuzzleHttp\Client|\Psr\Http\Client\ClientInterface $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }

    public function __construct()
    {
        $this->client = new GuzzleClient();
    }

    public function request(string $method, string $absUrl, array $headers, array $params): ResponseInterface
    {
        $method = strtolower($method);
        if (($method !== 'get' && $method !== 'post') || ! is_callable([$this->client, $method])) {
            throw new UnexpectedValueException("Unrecognized method $method");
        }

        $requestParams = [
            'query' => $params
        ];

        if ($method === 'post') {
            $requestParams = [
                'json' => $params
            ];
        }

        return $this->client->$method(
            $absUrl,
            array_merge(
                [
                    'headers'     => $headers,
                    'http_errors' => false
                ],
                $requestParams
            )
        );
    }
}
