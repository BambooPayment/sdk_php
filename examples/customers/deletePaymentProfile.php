<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $customer = $bambooPaymentClient->customers->deletePaymentProfile(53479, 55795);

    echo '<pre>';
    print_r($customer->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
