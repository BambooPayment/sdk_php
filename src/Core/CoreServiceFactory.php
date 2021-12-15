<?php

namespace BambooPayment\Core;

use BambooPayment\Service\CustomerService;
use BambooPayment\Service\PurchaseService;

class CoreServiceFactory extends AbstractServiceFactory
{
    /***
     * Array of services that can be instantiate
     * @var array<string, string>
     */
    private static $CLASS_MAP
        = [
            'customers' => CustomerService::class,
            'purchases' => PurchaseService::class,
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
