<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\BambooPaymentClient;
use BambooPayment\Core\ErrorHandler;
use BambooPayment\Exception\ApiBadParametersException;
use BambooPayment\Exception\ApiConnectionException;
use BambooPayment\Exception\AuthenticationException;
use BambooPayment\Exception\BadMethodCallException;
use BambooPayment\Exception\InvalidRequestException;
use PHPUnit\Framework\TestCase;

class ErrorHandlerTest extends TestCase
{
    public function testThrowApiBadParametersException(): void
    {
        $errorHandler = new ErrorHandler();
        $body         = $this->getErrors();
        $exception    = new ApiBadParametersException('Error', 400, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);
        $errorHandler->handleErrorResponse($body, 400);
    }

    public function testThrowInvalidRequestException(): void
    {
        $errorHandler = new ErrorHandler();
        $body         = $this->getErrors();
        $exception    = new InvalidRequestException('Error', 404, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);
        $errorHandler->handleErrorResponse($body, 404);
    }

    public function testThrowAuthenticationException(): void
    {
        $errorHandler = new ErrorHandler();
        $body         = $this->getErrors();
        $exception    = new AuthenticationException('Error', 403, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);
        $errorHandler->handleErrorResponse($body, 403);
    }

    public function testThrowBadMethodCallException(): void
    {
        $errorHandler = new ErrorHandler();
        $body         = $this->getErrors();
        $exception    = new BadMethodCallException('Error', 405);

        $this->expectExceptionObject($exception);
        $errorHandler->handleErrorResponse($body, 405);
    }


    public function testThrowApiConnectionException(): void
    {
        $errorHandler = new ErrorHandler();
        $body         = $this->getErrors();
        $exception    = new ApiConnectionException('Error', 408, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);
        $errorHandler->handleErrorResponse($body, 408);
    }

    private function getErrors(): array
    {
        $body                                       = [];
        $body[BambooPaymentClient::ARRAY_ERROR_KEY] = [
            [
                'ErrorCode' => 'BP001',
                'Message'   => 'Error',
                'Detail'    => 'Error Detail',
            ]
        ];
        return $body;
    }

}
