<?php

use BambooPayment\Core\BambooPaymentClient;
use BambooPayment\Exception\ExceptionInterface;

require __DIR__ . '/../../vendor/autoload.php';

try {
    $bambooPaymentClient = new BambooPaymentClient(
        [
            'api_key'       => getenv('SECRET_KEY') ?: '<<BAMBOO-PAYMENT-PRIVATE-KEY>>',
            'testing'       => true,
            'isCheckoutPro' => true
        ]
    );
    $purchase            = $bambooPaymentClient->payments->create(
        [
            'amount'             => 19800,
            'currencyCode'       => 'COP',
            'lineItems'          => [
                [
                    'title'        => 'Macbook Pro',
                    'variation'    => 'string',
                    'description'  => 'Pantalla retina',
                    'imageUrl'     => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/mbp-spacegray-select-202011?wid=904&hei=840&fmt=jpeg&qlt=80&op_usm=0.5,0.5&.v=1613672894000',
                    'unitPrice'    => 19800,
                    'currencyCode' => 'COP',
                    'quantity'     => 1
                ]
            ],
            'customer'           => [
                'identifier' => 'test@bamboopayment.com'
            ],
            'onSuccessResultUrl' => 'https://www.bamboopayment.com/',
            'onErrorResultUrl'   => 'https://www.bamboopayment.com/?error=true',
            'onCancelResultUrl'  => 'https://www.bamboopayment.com/?cancel=true',
            'metadata'           => [
                'PaymentExpirationInMinutes' => '1440',
                'TaxAmount'                  => '2500'
            ],
            'countryData'        => [
                'invoiceNumber'   => '234',
                'taxableAmount'   => 10,
                'isFinalCustomer' => false
            ]
        ]
    );

    echo '<pre>';
    print_r($purchase->toArray());
    echo '</pre>';
} catch (ExceptionInterface $e) {
    var_dump($e->getMessage());
}
