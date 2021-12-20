<?php

use BambooPayment\Exception\ExceptionInterface;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../init-checkout-pro.php';

try {
    $documentsTypes = $bambooPaymentClient->documentsTypes->fetchDocumentTypesByCountry(1);

    foreach ($documentsTypes as $documentsType) {
        echo '<pre>';
        print_r($documentsType->toArray());
        echo '</pre>';
    }
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
