<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\ApiResponse;
use PHPUnit\Framework\TestCase;

class ApiResponseTest extends TestCase
{
    public function testCreateApiResponseWithWrongBody(): void
    {
        $apiResponse = new ApiResponse('{asas', 200);
        self::assertNull($apiResponse->json);
    }

}
