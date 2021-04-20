<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Address;
use BambooPaymentTests\BaseTest;

class AddressEntityTest extends BaseTest
{
    public function testHydrate(): void
    {
        $address = new Address();

        /** @var Address $address */
        $address = $address->hydrate(
            [
                'AddressId'     => 51615,
                'AddressType'   => 1,
                'Country'       => 'UY',
                'State'         => 'Montevideo',
                'AddressDetail' => '10000',
                'PostalCode'    => null,
                'City'          => 'MONTEVIDEO'
            ]
        );

        self::assertEquals(51615, $address->getAddressId());
        self::assertEquals(1, $address->getAddressType());
        self::assertEquals('UY', $address->getCountry());
        self::assertEquals('Montevideo', $address->getState());
        self::assertEquals('MONTEVIDEO', $address->getCity());
        self::assertNull($address->getPostalCode());
    }
}
