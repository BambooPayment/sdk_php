<?php

use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . '/../init.php';

try {
    $customer = $bambooPaymentClient->customers->update(
        53479,
        [
            'Email'          => 'Email222222@bamboopayment.com',
            'FirstName'      => 'PrimerNombre 2222',
            'LastName'       => 'PrimerApellido 2222',
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
