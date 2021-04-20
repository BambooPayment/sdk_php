<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $purchases = $bambooPaymentClient->purchases->all();

    foreach ($purchases as $purchase) {
        echo '<pre>';
        print_r($purchase->toArray());
        echo '</pre>';
    }
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
