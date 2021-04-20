<?php

namespace BambooPayment\Core;

use BambooPayment\Service\CustomerService;
use BambooPayment\Service\PurchaseService;

class CoreServiceFactory extends AbstractServiceFactory
{
    /***
     * @var array<string, string>
     */
    private static array $classMap
        = [
            'customers' => CustomerService::class,
            'purchases' => PurchaseService::class,
        ];

    public function getServiceClass(string $name): ?string
    {
        return self::$classMap[$name] ?? null;
    }
}
