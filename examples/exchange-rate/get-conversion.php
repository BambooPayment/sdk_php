<?php

use BambooPayment\Exception\ExceptionInterface;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../init-checkout-pro.php';

try {
    $exchangeRate = $bambooPaymentClient->exchangeRate->getConversion(100, 'AR');

    echo '<pre>';
    print_r($exchangeRate->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
