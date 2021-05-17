<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Address;
use BambooPaymentTests\SharedData;

/**
 * Class AddressEntityTest
 * @package BambooPaymentTests\Entity
 */
class AddressEntityTest extends SharedData
{
    /*** Entity attributes keys ***/
    public const ADDRESS_ID     = 'AddressId';
    public const ADDRESS_TYPE   = 'AddressType';
    public const COUNTRY        = 'Country';
    public const STATE          = 'State';
    public const ADDRESS_DETAIL = 'AddressDetail';
    public const POSTAL_CODE    = 'PostalCode';
    public const CITY           = 'City';

    public function testHydrate(): void
    {
        $address = new Address();
        $data    = $this->getDataOfAddress();
        $address = $address->hydrate($data);

        $this->makeTestOfAddress($data, $address);
    }
}
