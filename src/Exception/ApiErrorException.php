<?php

namespace BambooPayment\Exception;

use Exception;

abstract class ApiErrorException extends Exception implements ExceptionInterface
{
    protected ?string $errorMessage;
    protected ?int $httpStatus;
    protected ?array $jsonBody;
    protected ?string $requestId;
    protected ?string $bambooPaymentCode;
    protected ?string $bambooPaymentDetail;

    /**
     * ApiErrorException constructor.
     *
     * @param string|null $errorMessage
     * @param int|null $httpStatus
     * @param array|null $jsonBody
     * @param string|null $requestId
     * @param string|null $bambooPaymentCode
     * @param string|null $bambooPaymentDetail
     */
    public function __construct(
        ?string $errorMessage,
        ?int $httpStatus,
        ?array $jsonBody,
        ?string $bambooPaymentCode,
        ?string $bambooPaymentDetail,
        ?string $requestId = null
    ) {
        parent::__construct($errorMessage);
        $this->errorMessage        = $errorMessage;
        $this->httpStatus          = $httpStatus;
        $this->jsonBody            = $jsonBody;
        $this->requestId           = $requestId;
        $this->bambooPaymentCode   = $bambooPaymentCode;
        $this->bambooPaymentDetail = $bambooPaymentDetail;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * @return string|null
     */
    public function getBambooPaymentDetail(): ?string
    {
        return $this->bambooPaymentDetail;
    }

    /**
     * @return int|null
     */
    public function getHttpStatus(): ?int
    {
        return $this->httpStatus;
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
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @return string|null
     */
    public function getBambooPaymentCode(): ?string
    {
        return $this->bambooPaymentCode;
    }

    /**
     * Returns the string representation of the exception.
     *
     * @return string
     */
    public function __toString(): string
    {
        $statusStr = ($this->getHttpStatus() === null) ? '' : "(Status {$this->getHttpStatus()}) ";
        $idStr     = ($this->getRequestId() === null) ? '' : "(Request {$this->getRequestId()}) ";

        return "$statusStr$idStr{$this->getMessage()}";
    }
}
