<?php

namespace BambooPayment\ResponseInterpreter;

use BambooPayment\Core\ApiResponse;
use BambooPayment\Core\ErrorHandler;
use BambooPayment\Exception\ApiErrorException;
use BambooPayment\Exception\InvalidRequestException;
use BambooPayment\Exception\UnknownApiErrorException;
use Exception;
use function count;

class ResponseInterpreterCheckoutPro implements ResponseInterpreterInterface
{
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
            $this->handleErrors($body['errors'] ?? [], $body, $code);
        } catch (Exception $e) {
            throw $e;
        }

        $resultKey = $apiResponse->resultKey ?? null;
        if ($resultKey !== null) {
            $body = $body[$resultKey];
            if (! \is_array($body)) {
                return [$resultKey => $body];
            }
        }

        return $body ?? [];
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
            $bambooPaymentErrorCode = $errorData['code'] ?? null;
            $bambooPaymentMessage   = $errorData['message'] ?? null;

            $errorHandler->throwSpecificException(
                $code,
                $body,
                $bambooPaymentErrorCode,
                $bambooPaymentMessage
            );
        }
    }
}
