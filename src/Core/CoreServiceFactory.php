<?php

namespace BambooPayment\Core;

use BambooPayment\Service as Service;

class CoreServiceFactory extends AbstractServiceFactory
{
    /***
     * Array of services that can be instantiated
     * @var array<string, string>
     */
    private static $CLASS_MAP
        = [
            'customers'            => Service\CustomerService::class,
            'purchases'            => Service\PurchaseService::class,
            'payments'             => Service\PaymentService::class,
            'countries'            => Service\CountryService::class,
            'documentsTypes'       => Service\DocumentTypeService::class,
            'issuersBanks'         => Service\IssuerBankService::class,
            'exchangeRate'         => Service\ExchangeRateService::class,
            'paymentStatus'        => Service\PaymentStatusService::class,
            'paymentRefund'        => Service\PaymentRefundService::class,
            'countryPaymentMethod' => Service\CountryPaymentMethodService::class,
        ];

    /***
     * Return service class FQN
     *
     * @param string $name
     * @return string|null
     */
    public function getServiceClass(string $name): ?string
    {
        return self::$CLASS_MAP[$name] ?? null;
    }
}
