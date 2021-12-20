<?php

namespace BambooPayment\Core;

use BambooPayment\Service\CountryService;
use BambooPayment\Service\CustomerService;
use BambooPayment\Service\DocumentTypeService;
use BambooPayment\Service\ExchangeRateService;
use BambooPayment\Service\IssuerBankService;
use BambooPayment\Service\PaymentRefundService;
use BambooPayment\Service\PaymentService;
use BambooPayment\Service\PaymentStatusService;
use BambooPayment\Service\PurchaseService;

class CoreServiceFactory extends AbstractServiceFactory
{
    /***
     * Array of services that can be instantiated
     * @var array<string, string>
     */
    private static $CLASS_MAP
        = [
            'customers'      => CustomerService::class,
            'purchases'      => PurchaseService::class,
            'payments'       => PaymentService::class,
            'countries'      => CountryService::class,
            'documentsTypes' => DocumentTypeService::class,
            'issuersBanks'   => IssuerBankService::class,
            'exchangeRate'   => ExchangeRateService::class,
            'paymentStatus'  => PaymentStatusService::class,
            'paymentRefund'  => PaymentRefundService::class,
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
