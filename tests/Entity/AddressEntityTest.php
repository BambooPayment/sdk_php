<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Address;
use BambooPaymentTests\SharedData;

class AddressEntityTest extends SharedData
{
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
        /** @var Address $address */
        $this->makeTestOfAddress($data, $address);
    }
}
