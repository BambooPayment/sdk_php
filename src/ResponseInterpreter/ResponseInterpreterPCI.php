<?php

namespace BambooPayment\ResponseInterpreter;

use BambooPayment\Core\ApiResponse;
use BambooPayment\Core\ErrorHandler;
use BambooPayment\Exception\ApiErrorException;
use BambooPayment\Exception\InvalidRequestException;
use BambooPayment\Exception\UnknownApiErrorException;
use Exception;
use function count;

class ResponseInterpreterPCI implements ResponseInterpreterInterface
{
    private const  ARRAY_ERROR_KEY  = 'Errors';
    private const  ARRAY_RESULT_KEY = 'Response';

    /**
     * Return the data from the API response or throw an error.
     *
     * @param \BambooPayment\Core\ApiResponse $apiResponse
     *
     * @return array
     *
     * @throws ApiErrorException
     * @throws InvalidRequestException
     * @throws UnknownApiErrorException
     */
    public function interpretResponse(ApiResponse $apiResponse): array
    {
        $body = $apiResponse->json;
        $code = $apiResponse->code;

        try {
            $this->handleErrors($body[self::ARRAY_ERROR_KEY] ?? [], $body, $code);
        } catch (Exception $e) {
            throw $e;
        }

        return $body[self::ARRAY_RESULT_KEY] ?? [];
    }

    /**
     * @throws \BambooPayment\Exception\ApiBadParametersException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     * @throws \BambooPayment\Exception\ApiConnectionException
     */
    private function handleErrors(array $errors, $body, int $code): void
    {
        if (count($errors) > 0) {
            $errorHandler           = new ErrorHandler();
            $errorData              = $errors[0];
            $bambooPaymentErrorCode = $errorData['ErrorCode'] ?? null;
            $bambooPaymentMessage   = $errorData['Message'] ?? null;
            $bambooPaymentDetail    = $errorData['Detail'] ?? null;

            $errorHandler->throwSpecificException(
                $code,
                $body,
                $bambooPaymentErrorCode,
                $bambooPaymentMessage,
                $bambooPaymentDetail
            );
        }
    }
}
