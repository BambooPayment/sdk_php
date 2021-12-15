<?php

namespace BambooPayment\Core;

use Exception;
use function json_decode;

class ApiResponse
{
    public $headers;
    public $json;
    public $code;

    public function __construct(?string $body, int $statusCode, ?array $headers = null)
    {
        $this->code    = $statusCode;
        $this->headers = $headers ?? [];

        try {
            $json = json_decode($body, true);
        } catch (Exception $exception) {
            $json = null;
            unset($exception);
        }

        $this->json = $json;
    }
}
