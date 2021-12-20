<?php

namespace BambooPaymentTests\Core;

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
        $exception    = new ApiBadParametersException('Error', 400, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);

        $errors = $this->getErrors();
        $errorHandler->throwSpecificException(400, [], $errors['ErrorCode'], $errors['Message'], $errors['Detail']);
    }

    public function testThrowInvalidRequestException(): void
    {
        $errorHandler = new ErrorHandler();
        $exception    = new InvalidRequestException('Error', 404, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);

        $errors = $this->getErrors();
        $errorHandler->throwSpecificException(404, [], $errors['ErrorCode'], $errors['Message'], $errors['Detail']);
    }

    public function testThrowAuthenticationException(): void
    {
        $errorHandler = new ErrorHandler();
        $exception    = new AuthenticationException('Error', 403, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);

        $errors = $this->getErrors();
        $errorHandler->throwSpecificException(403, [], $errors['ErrorCode'], $errors['Message'], $errors['Detail']);
    }

    public function testThrowBadMethodCallException(): void
    {
        $errorHandler = new ErrorHandler();
        $exception    = new BadMethodCallException('Error', 405);

        $this->expectExceptionObject($exception);

        $errors = $this->getErrors();
        $errorHandler->throwSpecificException(405, [], $errors['ErrorCode'], $errors['Message'], $errors['Detail']);
    }


    public function testThrowApiConnectionException(): void
    {
        $errorHandler = new ErrorHandler();
        $exception    = new ApiConnectionException('Error', 408, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);

        $errors = $this->getErrors();
        $errorHandler->throwSpecificException(408, [], $errors['ErrorCode'], $errors['Message'], $errors['Detail']);
    }

    private function getErrors(): array
    {
        return [
            'ErrorCode' => 'BP001',
            'Message'   => 'Error',
            'Detail'    => 'Error Detail',
        ];
    }

}
