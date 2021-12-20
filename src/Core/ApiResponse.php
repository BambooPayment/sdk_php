<?php

namespace BambooPayment\Core;

use Exception;
use function json_decode;

class ApiResponse
{
    /* @var array|null $headers */
    public $headers;

    /* @var array|null $headers */
    public $json;

    /* @var int $code */
    public $code;

    /* @var string|null $resultKey */
    public $resultKey;

    public function __construct(
        ?string $body,
        int $statusCode,
        ?array $headers = null,
        ?string $resultKey = null
    ) {
        $this->code      = $statusCode;
        $this->resultKey = $resultKey;
        $this->headers   = $headers ?? [];

        try {
            $json = json_decode($body, true);
        } catch (Exception $exception) {
            $json = null;
            unset($exception);
        }

        $this->json = $json;
    }
}
