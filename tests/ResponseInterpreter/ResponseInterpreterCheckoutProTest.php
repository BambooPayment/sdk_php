<?php

namespace BambooPaymentTests\ResponseInterpreter;

use BambooPayment\Core\ApiResponse;
use BambooPayment\Core\ErrorHandler;
use BambooPayment\Exception\ApiBadParametersException;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPaymentTests\BaseTest;

class ResponseInterpreterCheckoutProTest extends BaseTest
{
    public function testThrowApiBadParametersException(): void
    {
        $errorHandler = new ErrorHandler();
        $exception    = new ApiBadParametersException('Error', 400, [], 'BP001', 'Error Detail');

        $this->expectExceptionObject($exception);

        $errors = $this->getErrors();
        $errorHandler->throwSpecificException(400, [], $errors['code'], $errors['message']);
    }

    public function testReturnASingleValue(): void
    {
        $interpreter = new ResponseInterpreterCheckoutPro();

        $apiResponse = new ApiResponse(
            '{ "amount": 100}',
            200,
            [],
            'amount'
        );

        self::assertEquals([
            'amount' => 100
        ], $interpreter->interpretResponse($apiResponse));
    }

    private function getErrors(): array
    {
        return [
            'code'    => 'BP001',
            'message' => 'Error'
        ];
    }
}
