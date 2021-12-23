<?php

use BambooPayment\Exception\ExceptionInterface;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../init-checkout-pro.php';

try {
    $paymentMethods = $bambooPaymentClient->countryPaymentMethod->fetchPaymentMethods();

    foreach ($paymentMethods as $paymentMethod) {
        echo '<pre>';
        print_r($paymentMethod->toArray());
        echo '</pre>';
    }
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
