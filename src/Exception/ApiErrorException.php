<?php

namespace BambooPayment\Exception;

use Exception;

abstract class ApiErrorException extends Exception implements ExceptionInterface
{
    protected $jsonBody;
    protected $requestId;
    protected $bambooPaymentCode;
    protected $bambooPaymentDetail;

    /**
     * ApiErrorException constructor.
     *
     * @param string|null $errorMessage
     * @param int|null $httpStatus
     * @param array|null $jsonBody
     * @param string|null $bambooPaymentCode
     * @param string|null $bambooPaymentDetail
     */
    public function __construct(
        ?string $errorMessage,
        ?int $httpStatus,
        ?array $jsonBody,
        ?string $bambooPaymentCode,
        ?string $bambooPaymentDetail
    ) {
        parent::__construct($errorMessage, $httpStatus);
        $this->jsonBody            = $jsonBody;
        $this->bambooPaymentCode   = $bambooPaymentCode;
        $this->bambooPaymentDetail = $bambooPaymentDetail;
    }

    /**
     * @return string|null
     */
    public function getBambooPaymentDetail(): ?string
    {
        return $this->bambooPaymentDetail;
    }

    /**
     * @return array|null
     */
    public function getJsonBody(): ?array
    {
        return $this->jsonBody;
    }

    /**
     * @return string|null
     */
    public function getBambooPaymentCode(): ?string
    {
        return $this->bambooPaymentCode;
    }
}
