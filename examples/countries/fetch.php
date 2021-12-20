<?php

use BambooPayment\Exception\ExceptionInterface;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../init-checkout-pro.php';

try {
    $country = $bambooPaymentClient->countries->fetch(1);

    echo '<pre>';
    print_r($country->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
