<?php

use BambooPayment\Exception\ExceptionInterface;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../init-checkout-pro.php';

try {
    $issuersBanks = $bambooPaymentClient->issuersBanks->fetchDocumentTypesByCountry(1);

    foreach ($issuersBanks as $issuerBank) {
        echo '<pre>';
        print_r($issuerBank->toArray());
        echo '</pre>';
    }
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
