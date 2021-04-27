<?php

namespace BambooPayment\Core;

use const JSON_THROW_ON_ERROR;
use JsonException;
use function json_decode;

class ApiResponse
{
    public ?array $headers;
    public $json;
    public int $code;

    public function __construct(?string $body, int $statusCode, ?array $headers = null)
    {
        $this->code    = $statusCode;
        $this->headers = $headers ?? [];

        try {
            $json = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            $json = null;
            unset($exception);
        }

        $this->json = $json;
    }
}
