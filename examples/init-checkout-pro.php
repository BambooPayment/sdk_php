<?php

use BambooPayment\Core\BambooPaymentClient;

require __DIR__ . '/../vendor/autoload.php';

$bambooPaymentClient = new BambooPaymentClient(
    [
        'api_key'       => getenv('SECRET_KEY') ?: '<<BAMBOO-PAYMENT-PRIVATE-KEY>>',
        'testing'       => true,
        'isCheckoutPro' => true
    ]
);
