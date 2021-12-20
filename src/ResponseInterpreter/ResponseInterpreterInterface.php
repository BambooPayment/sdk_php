<?php

namespace BambooPayment\ResponseInterpreter;

use BambooPayment\Core\ApiResponse;

interface ResponseInterpreterInterface
{
    public function interpretResponse(ApiResponse $apiResponse): array;
}
