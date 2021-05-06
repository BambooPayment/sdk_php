
# bamboopayment-sdk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github]][link-github]
[![Coverage Status][ico-coveralls]][link-coveralls]
[![Total Downloads][ico-downloads]][link-downloads]

## System Requirements
You need PHP >= 7.4

## Dependencies

The bindings require the following extensions in order to work properly:

-   [`ext-json`](https://secure.php.net/manual/en/book.json.php)
-   [`guzzle`](https://docs.guzzlephp.org/) (Guzzle is a PHP HTTP client to send HTTP requests and to integrate with web services.)
-   [`generated-hydrator`](https://secure.php.net/manual/en/book.curl.php) (GeneratedHydrator is a library about high performance transition of data from arrays to objects and from objects to arrays.)


If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Documentation

Full documentation: [Spanish][doc-es], [English][doc-en], [Portuguese][doc-pt].

## Installation

#### Composer

To install with Composer, simply run the following command:
```php
composer require bamboopayment/bamboopayment-sdk
```

Or you can manually add the requirement to your composer.json file:

```php
{
  "require" : {
    "bamboopayment/bamboopayment-sdk" : "0.1.*"
  }
}
```
Then install by running

```php
composer.phar install
```


#### Manual installation
Obtain the latest version of BambooPayment SDK with:
```php
git clone https://github.com/BambooPayment/sdk_php.git
```

## Getting started

If you are using Composer use autoload functionality:

```php
include "vendor/autoload.php";
```

## Usage

#### Creating a customer

   File with working example: [examples/customers/create.php](examples/customers/create.php)

   To create an order using REST API in back-end you must provide an Array with customer data:

   in your controller
```php
    $bambooPaymentClient = new BambooPaymentClient([
        'api_key' => PRIVATE_KEY,
        'testing' => true,
    ]);

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
```

#### Creating a purchase

   File with working example: [examples/purchases/create.php](examples/purchases/create.php)

   To create an order using REST API in back-end you must provide an Array with purchase data:

   in your controller
```php
    $bambooPaymentClient = new BambooPaymentClient([
        'api_key' => PRIVATE_KEY,
        'testing' => true,
    ]);

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
```

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes using the [Angular Contributing Guide](https://github.com/angular/angular/blob/master/CONTRIBUTING.md#type) (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Run composer test to test your code (`composer test`)
6. Create new Pull Request

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

<!--external links:-->
[ico-version]: https://img.shields.io/packagist/v/bamboopayment/bamboopayment-sdk.svg?style=flat-square

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

[ico-github]:  https://github.com/BambooPayment/sdk_php/workflows/build/badge.svg

[ico-coveralls]: https://coveralls.io/repos/github/BambooPayment/sdk_php/badge.svg?branch=master&kill_cache=1

[ico-downloads]: https://img.shields.io/packagist/dt/bamboopayment/bamboopayment-sdk.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/bamboopayment/bamboopayment-sdk

[link-github]: https://github.com/BambooPayment/sdk_php/actions?query=workflow%3A%22build%22

[link-coveralls]: https://coveralls.io/github/BambooPayment/sdk_php?branch=master

[link-downloads]: https://packagist.org/packages/bamboopayment/bamboopayment-sdk

[link-author]: https://github.com/BambooPayment/sdk_php

[link-contributors]: ../../contributors

[doc-es]: https://dev.bamboopayment.com/docs/es-api-bamboo-payment-pci/

[doc-en]: https://dev.bamboopayment.com/docs/en-api-bamboo-payment-pci/

[doc-pt]: https://dev.bamboopayment.com/docs/pt-api-bamboo-payment-pci/

