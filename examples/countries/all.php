<?php

use BambooPayment\Core\BambooPaymentClient;
use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $bambooPaymentClient = new BambooPaymentClient(
        [
            'api_key'       => getenv('SECRET_KEY') ?: '<<BAMBOO-PAYMENT-PRIVATE-KEY>>',
            'testing'       => true,
            'isCheckoutPro' => true
        ]
    );

    $countries = $bambooPaymentClient->countries->all();

    foreach ($countries as $country) {
        echo '<pre>';
        print_r($country->toArray());
        echo '</pre>';
    }
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
