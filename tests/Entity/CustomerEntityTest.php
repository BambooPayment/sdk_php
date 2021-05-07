<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Customer;
use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\BaseTest;

class CustomerEntityTest extends BaseTest
{
    public const CUSTOMER_ID          = 'CustomerId';
    public const CREATED              = 'Created';
    public const COMMERCE_CUSTOMER_ID = 'CommerceCustomerId';
    public const OWNER                = 'Owner';
    public const EMAIL                = 'Email';
    public const ENABLED              = 'Enabled';
    public const SHIPPING_ADDRESS     = 'ShippingAddress';
    public const BILLING_ADDRESS      = 'BillingAddress';
    public const PLANS                = 'Plans';
    public const ADDITIONAL_DATA      = 'AdditionalData';
    public const PAYMENT_PROFILES     = 'PaymentProfiles';
    public const CAPTURE_URL          = 'CaptureURL';
    public const UNIQUE_ID            = 'UniqueID';
    public const URL                  = 'URL';
    public const FIRST_NAME           = 'FirstName';
    public const LAST_NAME            = 'LastName';
    public const DOC_NUMBER           = 'DocNumber';
    public const DOCUMENT_TYPE_ID     = 'DocumentTypeId';
    public const PHONE_NUMBER         = 'PhoneNumber';


    public function testHydrate(): void
    {
        $customer = new Customer();

        /** @var Customer $customer */
        $customer = $customer->hydrate(
            [
                self::CUSTOMER_ID          => 53479,
                self::CREATED              => '2021-04-06T16:08:43.767',
                self::COMMERCE_CUSTOMER_ID => null,
                self::OWNER                => 'Commerce',
                self::EMAIL                => 'Email222222@bamboopayment.com',
                self::ENABLED              => true,
                self::SHIPPING_ADDRESS     => null,
                self::BILLING_ADDRESS      => [
                    'AddressId'     => 51615,
                    'AddressType'   => 1,
                    'Country'       => 'UY',
                    'State'         => 'Montevideo',
                    'AddressDetail' => '10000',
                    'PostalCode'    => null,
                    'City'          => 'MONTEVIDEO'
                ],
                self::PLANS                => null,
                self::ADDITIONAL_DATA      => null,
                self::PAYMENT_PROFILES     => [],
                self::CAPTURE_URL          => 'https://testapi.siemprepago.com/v1/Capture/',
                self::UNIQUE_ID            => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                self::URL                  => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                self::FIRST_NAME           => 'PrimerNombre 2222',
                self::LAST_NAME            => 'PrimerApellido 2222',
                self::DOC_NUMBER           => '12345672',
                self::DOCUMENT_TYPE_ID     => 2,
                self::PHONE_NUMBER         => '24022330'
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
                self::CUSTOMER_ID          => 53479,
                self::CREATED              => '2021-04-06T16:08:43.767',
                self::COMMERCE_CUSTOMER_ID => null,
                self::OWNER                => 'Commerce',
                self::EMAIL                => 'Email222222@bamboopayment.com',
                self::ENABLED              => true,
                self::SHIPPING_ADDRESS     => null,
                self::PLANS                => null,
                self::ADDITIONAL_DATA      => null,
                self::PAYMENT_PROFILES     => [],
                self::CAPTURE_URL          => 'https://testapi.siemprepago.com/v1/Capture/',
                self::UNIQUE_ID            => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                self::URL                  => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                self::FIRST_NAME           => 'PrimerNombre 2222',
                self::LAST_NAME            => 'PrimerApellido 2222',
                self::DOC_NUMBER           => '12345672',
                self::DOCUMENT_TYPE_ID     => 2,
                self::PHONE_NUMBER         => '24022330'
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
                self::CUSTOMER_ID          => 53479,
                self::CREATED              => '2021-04-06T16:08:43.767',
                self::COMMERCE_CUSTOMER_ID => null,
                self::OWNER                => 'Commerce',
                self::EMAIL                => 'Email222222@bamboopayment.com',
                self::ENABLED              => true,
                self::SHIPPING_ADDRESS     => null,
                self::BILLING_ADDRESS      => [
                    'AddressId'     => 51615,
                    'AddressType'   => 1,
                    'Country'       => 'UY',
                    'State'         => 'Montevideo',
                    'AddressDetail' => '10000',
                    'PostalCode'    => null,
                    'City'          => 'MONTEVIDEO'
                ],
                self::PLANS                => null,
                self::ADDITIONAL_DATA      => null,
                self::PAYMENT_PROFILES     => [
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
                self::CAPTURE_URL          => 'https://testapi.siemprepago.com/v1/Capture/',
                self::UNIQUE_ID            => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                self::URL                  => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                self::FIRST_NAME           => 'PrimerNombre 2222',
                self::LAST_NAME            => 'PrimerApellido 2222',
                self::DOC_NUMBER           => '12345672',
                self::DOCUMENT_TYPE_ID     => 2,
                self::PHONE_NUMBER         => '24022330'
            ]
        );

        $paymentProfiles = $customer->getPaymentProfiles();
        self::assertNotEmpty($paymentProfiles);

        $paymentProfile = $paymentProfiles[0];
        self::assertInstanceOf(PaymentProfile::class, $paymentProfile);
    }
}
