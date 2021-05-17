<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\CustomerActivation;
use BambooPaymentTests\BaseTest;

/**
 * Class CustomerActivationEntityTest
 * @package BambooPaymentTests\Entity
 */
class CustomerActivationEntityTest extends BaseTest
{
    /*** Entity attributes keys ***/
    private const TOKEN           = 'Token';
    private const ACTIVATION_CODE = 'ActivationCode';

    public function testHydrate(): void
    {
        $customerActivation = new CustomerActivation();
        $data               = $this->getDataOfCustomerActivation();
        $customerActivation = $customerActivation->hydrate($data);

        self::assertInstanceOf(CustomerActivation::class, $customerActivation);
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
