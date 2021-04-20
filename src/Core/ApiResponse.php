<?php

namespace BambooPayment\Core;

use const JSON_THROW_ON_ERROR;
use JsonException;
use function json_decode;

/**
 * Class ApiResponse.
 */
class ApiResponse
{
    /**
     * @var null|array
     */
    public ?array $headers;

    /**
     * @var null|array
     */
    public $json;

    /**
     * @var int
     */
    public int $code;

    /**
     * @param string|null $body
     * @param int $statusCode
     * @param array|null $headers
     */
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
