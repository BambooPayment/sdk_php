<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $purchase = $bambooPaymentClient->purchases->create(
        [
            'TrxToken'     => 'OT__klLNXDDkgAvk1KXG-i6SIUxo-ACnvpjf4jiYpVJ8SzQ_',
            'Order'        => '12345678',
            'Amount'       => 100,
            'Installments' => 1,
            'Customer'     => [
                'Email'          => 'juanperez123@bamboopayment.com',
                'FirstName'      => 'Juan',
                'LastName'       => 'Perez',
                'PhoneNumber'    => '099123123',
                'DocNumber'      => '12345672',
                'DocumentTypeId' => 2,
                'BillingAddress' => [
                    'AddressType'   => 1,
                    'Country'       => 'Uruguay',
                    'State'         => 'Montevideo',
                    'City'          => 'MONTEVIDEO',
                    'AddressDetail' => 'Av. Sarmiento 2260'
                ]
            ],
            'DataUY'       => [
                'IsFinalConsumer' => 'true',
                'Invoice'         => '1000',
                'TaxableAmount'   => 100
            ],
            'Currency'     => 'UYU',
            'Capture'      => 'true'
        ]
    );

    echo '<pre>';
    print_r($purchase->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
