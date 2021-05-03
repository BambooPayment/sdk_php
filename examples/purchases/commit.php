<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $purchase = $bambooPaymentClient->purchases->commit(999);

    echo '<pre>';
    print_r($purchase->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
