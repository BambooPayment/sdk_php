<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $purchases = $bambooPaymentClient->purchases->all(
        [
            'From' => '20210401',
            'To'   => '20210430'
        ]);

    foreach ($purchases as $purchase) {
        echo '<pre>';
        print_r($purchase->toArray());
        echo '</pre>';
    }
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
