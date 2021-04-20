<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $customer = $bambooPaymentClient->customers->create(
        [
            'Email'          => 'testing@bamboopayment.com',
            'FirstName'      => 'PrimerNombre',
            'LastName'       => 'PrimerApellido',
            'DocNumber'      => 12345672,
            'DocumentTypeId' => 2,
            'PhoneNumber'    => '24022330',
            'BillingAddress' => [
                'AddressType'   => 1,
                'Country'       => 'UY',
                'State'         => 'Montevideo',
                'City'          => 'MONTEVIDEO',
                'AddressDetail' => '10000'
            ]
        ]
    );

    echo '<pre>';
    print_r($customer->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
