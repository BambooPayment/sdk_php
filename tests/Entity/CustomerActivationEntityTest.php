<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\CustomerActivation;
use BambooPaymentTests\BaseTest;

class CustomerActivationEntityTest extends BaseTest
{
    private const TOKEN           = 'Token';
    private const ACTIVATION_CODE = 'ActivationCode';

    public function testHydrate(): void
    {
        $customerActivation = new CustomerActivation();
        $data               = $this->getDataOfCustomerActivation();

        $customerActivation = $customerActivation->hydrate($data);

        self::assertEquals($data[self::TOKEN], $customerActivation->getToken());
        self::assertEquals($data[self::ACTIVATION_CODE], $customerActivation->getActivationCode());
    }

    private function getDataOfCustomerActivation(): array
    {
        return [
                self::TOKEN           => 'OT__wrRvTzyIBv8Do3X_PsfuQzJrhdvga1Wy4jiYpVJ8SzQ_',
                self::ACTIVATION_CODE => '1234'
            ];
    }
}
