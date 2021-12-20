<?php

namespace BambooPayment\Core;

use BambooPayment\Exception\ApiBadParametersException;
use BambooPayment\Exception\ApiConnectionException;
use BambooPayment\Exception\AuthenticationException;
use BambooPayment\Exception\BadMethodCallException;
use BambooPayment\Exception\InvalidRequestException;
use BambooPayment\Exception\UnknownApiErrorException;

class ErrorHandler
{
    /**
     * Check the error code and throw the specific exception.
     *
     * @param int $code
     * @param array $body
     * @param $bambooPaymentErrorCode
     * @param $bambooPaymentMessage
     * @param $bambooPaymentDetail
     *
     * @throws \BambooPayment\Exception\ApiBadParametersException
     * @throws \BambooPayment\Exception\ApiConnectionException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function throwSpecificException(
        int $code,
        array $body,
        $bambooPaymentErrorCode = null,
        $bambooPaymentMessage = null,
        $bambooPaymentDetail = null
    ): void {
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
