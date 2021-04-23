<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Customer;
use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\BaseTest;

class CustomerEntityTest extends BaseTest
{
    public function testHydrate(): void
    {
        $customer = new Customer();

        /** @var Customer $customer */
        $customer = $customer->hydrate(
            [
                'CustomerId'         => 53479,
                'Created'            => '2021-04-06T16:08:43.767',
                'CommerceCustomerId' => null,
                'Owner'              => 'Commerce',
                'Email'              => 'Email222222@bamboopayment.com',
                'Enabled'            => true,
                'ShippingAddress'    => null,
                'BillingAddress'     => [
                    'AddressId'     => 51615,
                    'AddressType'   => 1,
                    'Country'       => 'UY',
                    'State'         => 'Montevideo',
                    'AddressDetail' => '10000',
                    'PostalCode'    => null,
                    'City'          => 'MONTEVIDEO'
                ],
                'Plans'              => null,
                'AdditionalData'     => null,
                'PaymentProfiles'    => [],
                'CaptureURL'         => 'https://testapi.siemprepago.com/v1/Capture/',
                'UniqueID'           => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                'URL'                => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                'FirstName'          => 'PrimerNombre 2222',
                'LastName'           => 'PrimerApellido 2222',
                'DocNumber'          => '12345672',
                'DocumentTypeId'     => 2,
                'PhoneNumber'        => '24022330'
            ]
        );

        self::assertEquals(53479, $customer->getCustomerId());
        self::assertEquals('2021-04-06T16:08:43.767', $customer->getCreated());
        self::assertNull($customer->getCommerceCustomerId());
        self::assertEquals('Commerce', $customer->getOwner());
        self::assertEquals('Email222222@bamboopayment.com', $customer->getEmail());
        self::assertTrue($customer->getEnabled());
        self::assertNull($customer->getShippingAddress());
        $billingAddress = $customer->getBillingAddress();
        self::assertEquals(51615, $billingAddress->getAddressId());
        self::assertEquals(1, $billingAddress->getAddressType());
        self::assertEquals('UY', $billingAddress->getCountry());
        self::assertEquals('Montevideo', $billingAddress->getState());
        self::assertEquals('10000', $billingAddress->getAddressDetail());
        self::assertEquals(null, $billingAddress->getPostalCode());
        self::assertEquals('MONTEVIDEO', $billingAddress->getCity());
        self::assertNull($customer->getAdditionalData());
        self::assertIsArray($customer->getPaymentProfiles());
        self::assertEquals('https://testapi.siemprepago.com/v1/Capture/', $customer->getCaptureURL());
        self::assertEquals('UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b', $customer->getUniqueID());
        self::assertEquals('PrimerNombre 2222', $customer->getFirstName());
        self::assertEquals('PrimerApellido 2222', $customer->getLastName());
        self::assertEquals('12345672', $customer->getDocNumber());
        self::assertEquals(2, $customer->getDocumentTypeId());
        self::assertEquals('24022330', $customer->getPhoneNumber());

    }

    public function testHydrateWithNoAddress(): void
    {
        $customer = new Customer();

        /** @var Customer $customer */
        $customer = $customer->hydrate(
            [
                'CustomerId'         => 53479,
                'Created'            => '2021-04-06T16:08:43.767',
                'CommerceCustomerId' => null,
                'Owner'              => 'Commerce',
                'Email'              => 'Email222222@bamboopayment.com',
                'Enabled'            => true,
                'ShippingAddress'    => null,
                'Plans'              => null,
                'AdditionalData'     => null,
                'PaymentProfiles'    => [],
                'CaptureURL'         => 'https://testapi.siemprepago.com/v1/Capture/',
                'UniqueID'           => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                'URL'                => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                'FirstName'          => 'PrimerNombre 2222',
                'LastName'           => 'PrimerApellido 2222',
                'DocNumber'          => '12345672',
                'DocumentTypeId'     => 2,
                'PhoneNumber'        => '24022330'
            ]
        );

        self::assertNull($customer->getBillingAddress());
    }

    public function testHydrateWithPaymentProfile(): void
    {
        $customer = new Customer();

        /** @var Customer $customer */
        $customer = $customer->hydrate(
            [
                'CustomerId'         => 53479,
                'Created'            => '2021-04-06T16:08:43.767',
                'CommerceCustomerId' => null,
                'Owner'              => 'Commerce',
                'Email'              => 'Email222222@bamboopayment.com',
                'Enabled'            => true,
                'ShippingAddress'    => null,
                'BillingAddress'     => [
                    'AddressId'     => 51615,
                    'AddressType'   => 1,
                    'Country'       => 'UY',
                    'State'         => 'Montevideo',
                    'AddressDetail' => '10000',
                    'PostalCode'    => null,
                    'City'          => 'MONTEVIDEO'
                ],
                'Plans'              => null,
                'AdditionalData'     => null,
                'PaymentProfiles'    => [
                    [
                        'PaymentProfileId' => 55591,
                        'PaymentMediaId'   => 2,
                        'Created'          => '2021-04-19T11:26:17.693',
                        'LastUpdate'       => null,
                        'Brand'            => 'MasterCard',
                        'CardOwner'        => 'Juan Perez',
                        'Bin'              => null,
                        'IssuerBank'       => 'Santander',
                        'Installments'     => '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24',
                        'Type'             => 'CreditCard',
                        'IdCommerceToken'  => 0,
                        'Token'            => null,
                        'Expiration'       => '202211',
                        'Last4'            => '0001',
                        'Enabled'          => null,
                        'DocumentNumber'   => true,
                        'DocumentTypeId'   => null
                    ]
                ],
                'CaptureURL'         => 'https://testapi.siemprepago.com/v1/Capture/',
                'UniqueID'           => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                'URL'                => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                'FirstName'          => 'PrimerNombre 2222',
                'LastName'           => 'PrimerApellido 2222',
                'DocNumber'          => '12345672',
                'DocumentTypeId'     => 2,
                'PhoneNumber'        => '24022330'
            ]
        );

        $paymentProfiles = $customer->getPaymentProfiles();
        self::assertNotEmpty($paymentProfiles);

        $paymentProfile = $paymentProfiles[0];
        self::assertInstanceOf(PaymentProfile::class, $paymentProfile);
    }
}
