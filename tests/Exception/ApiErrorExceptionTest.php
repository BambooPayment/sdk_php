<?php

namespace BambooPaymentTests\Exception;

use BambooPayment\Exception\ApiConnectionException;
use PHPUnit\Framework\TestCase;

class ApiErrorExceptionTest extends TestCase
{
    public function testCreateApiErrorException(): void
    {
        $apiException = new ApiConnectionException('Test Error', 200, [], 'BP001', 'Error from Bamboo');

        self::assertEquals('Test Error', $apiException->getMessage());
        self::assertEquals(200, $apiException->getCode());
        self::assertEquals('BP001', $apiException->getBambooPaymentCode());
        self::assertNotNull($apiException->getJsonBody());
        self::assertEquals('Error from Bamboo', $apiException->getBambooPaymentDetail());
    }

}
