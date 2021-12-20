<?php

use BambooPayment\Exception\ExceptionInterface;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../init-checkout-pro.php';

try {
    $purchase = $bambooPaymentClient->paymentRefund->refund('49e236e6-c0c4-40ae-9fea-3533c06770ca', 198);

    echo '<pre>';
    print_r($purchase->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
