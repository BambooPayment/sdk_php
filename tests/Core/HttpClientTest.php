<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Exception\UnexpectedValueException;
use BambooPayment\HttpClient\HttpClient;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class HttpClientTest extends TestCase
{
    public function testGetRequestWithParams(): void
    {
        $guzzleMocked = $this->createPartialMock(Client::class, ['get']);
        $guzzleMocked->expects(self::once())
            ->method('get')
            ->with(
                '/test',
                [
                    'headers'     => [],
                    'http_errors' => false,
                    'query'       => ['param' => true]
                ]
            );

        $httpClient = new HttpClient();
        $httpClient->setClient($guzzleMocked);
        $httpClient->request(
            'get',
            '/test',
            [],
            [
                'param' => true
            ]
        );
    }

    public function testPostRequestWithParams(): void
    {
        $guzzleMocked = $this->createPartialMock(Client::class, ['post']);
        $guzzleMocked->expects(self::once())
            ->method('post')
            ->with(
                '/test',
                [
                    'headers'     => [],
                    'http_errors' => false,
                    'json'        => ['param' => true]
                ]
            );

        $httpClient = new HttpClient();
        $httpClient->setClient($guzzleMocked);
        $httpClient->request(
            'post',
            '/test',
            [],
            [
                'param' => true
            ]
        );
    }

    public function testWithUnknownMethod(): void
    {
        $guzzleMocked = $this->createMock(Client::class);

        $httpClient = new HttpClient();
        $httpClient->setClient($guzzleMocked);

        $this->expectExceptionMessage('Unrecognized method aaaa');
        $this->expectException(UnexpectedValueException::class);

        $httpClient->request(
            'AAAA',
            '/test',
            [],
            [
                'param' => true
            ]
        );
    }

    public function testGetInstance(): void
    {
        self::assertInstanceOf(HttpClient::class, HttpClient::instance());
    }
}
