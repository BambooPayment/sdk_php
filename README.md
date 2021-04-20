
# bamboopayment-sdk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github]][link-github]
[![Coverage Status][ico-coveralls]][link-coveralls]
[![Total Downloads][ico-downloads]][link-downloads]

``` bash
$bambooPaymentClient = new BambooPaymentClient([
    'api_key' => $privateKey,
    'testing' => true,
]);

$customer = $bambooPaymentClient->customers->fetch(customerId);
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/solcre/bamboopayment-sdk.svg?style=flat-square

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square

[ico-github]:  https://github.com/solcre-org/test-ci-php/workflows/build/badge.svg

[ico-coveralls]: https://coveralls.io/repos/github/solcre-org/test-ci-php/badge.svg?branch=main&kill_cache=1

[ico-downloads]: https://img.shields.io/packagist/dt/solcre/bamboopayment-sdk.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/solcre/bamboopayment-sdk

[link-github]: https://github.com/solcre-org/test-ci-php/actions?query=workflow%3A%22build%22

[link-coveralls]: https://coveralls.io/github/solcre-org/test-ci-php?branch=main

[link-downloads]: https://packagist.org/packages/solcre/bamboopayment-sdk

[link-author]: https://github.com/diego-sorribas

[link-contributors]: ../../contributors
