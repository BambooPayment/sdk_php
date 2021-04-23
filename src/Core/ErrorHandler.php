<?php

namespace BambooPayment\Core;

use BambooPayment\Exception\ApiBadParametersException;
use BambooPayment\Exception\ApiConnectionException;
use BambooPayment\Exception\ApiErrorException;
use BambooPayment\Exception\AuthenticationException;
use BambooPayment\Exception\BadMethodCallException;
use BambooPayment\Exception\InvalidRequestException;
use BambooPayment\Exception\UnknownApiErrorException;

class ErrorHandler
{
    /**
     * @throws ApiBadParametersException
     * @throws InvalidRequestException
     * @throws ApiErrorException
     * @throws AuthenticationException
     * @throws UnknownApiErrorException
     */
    public function handleErrorResponse(?array $body, int $code): void
    {
        $errorData = $body[BambooPaymentClient::ARRAY_ERROR_KEY];
        if (isset($errorData[0])) {
            $this->throwSpecificException($errorData[0], $code, $body);
        }
    }

    /**
     * @param array $errorData
     * @param int $code
     * @param array $body
     *
     * @throws ApiBadParametersException
     * @throws AuthenticationException
     * @throws InvalidRequestException
     * @throws UnknownApiErrorException|\BambooPayment\Exception\ApiConnectionException
     */
    private function throwSpecificException(array $errorData, int $code, array $body): void
    {
        $bambooPaymentErrorCode = $errorData['ErrorCode'] ?? null;
        $bambooPaymentMessage   = $errorData['Message'] ?? null;
        $bambooPaymentDetail    = $errorData['Detail'] ?? null;

        switch ($code) {
            case 400:
                throw new ApiBadParametersException($bambooPaymentMessage, $code, $body, $bambooPaymentErrorCode, $bambooPaymentDetail);
            case 404:
                throw new InvalidRequestException($bambooPaymentMessage, $code, $body, $bambooPaymentErrorCode, $bambooPaymentDetail);
            case 401 | 403:
                throw new AuthenticationException($bambooPaymentMessage, $code, $body, $bambooPaymentErrorCode, $bambooPaymentDetail);
            case 405:
                throw new BadMethodCallException($bambooPaymentMessage, $code);
            case 408:
                throw new ApiConnectionException($bambooPaymentMessage, $code, $body, $bambooPaymentErrorCode, $bambooPaymentDetail);

            default:
                throw new UnknownApiErrorException($bambooPaymentMessage, $code, $body, $bambooPaymentErrorCode, $bambooPaymentDetail);
        }
    }
}
