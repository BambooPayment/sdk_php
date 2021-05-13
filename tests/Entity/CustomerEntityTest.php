<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Customer;
use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\BaseTest;

/**
 * Class CustomerEntityTest
 * @package BambooPaymentTests\Entity
 */
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
        $data = $this->getDataOfCustomerWithoutPaymentProfile();

        /** @var Customer $customer */
        $customer = $customer->hydrate($data);

        self::assertEquals($data[self::CUSTOMER_ID], $customer->getCustomerId());
        self::assertEquals($data[self::CREATED], $customer->getCreated());
        self::assertNull($customer->getCommerceCustomerId());
        self::assertEquals($data[self::OWNER], $customer->getOwner());
        self::assertEquals($data[self::EMAIL], $customer->getEmail());
        self::assertTrue($customer->getEnabled());
        self::assertNull($customer->getShippingAddress());

        /* make tests of address */
        $billingAddress = $customer->getBillingAddress();
        self::assertEquals(51615, $billingAddress->getAddressId());
        self::assertEquals(1, $billingAddress->getAddressType());
        self::assertEquals('UY', $billingAddress->getCountry());
        self::assertEquals('Montevideo', $billingAddress->getState());
        self::assertEquals('10000', $billingAddress->getAddressDetail());
        self::assertEquals(null, $billingAddress->getPostalCode());
        self::assertEquals('MONTEVIDEO', $billingAddress->getCity());

        self::assertNull($customer->getAdditionalData());

        /* make test of payment profiles */
        self::assertIsArray($customer->getPaymentProfiles());
        self::assertEquals($data[self::CAPTURE_URL], $customer->getCaptureURL());
        self::assertEquals($data[self::UNIQUE_ID], $customer->getUniqueID());
        self::assertEquals($data[self::FIRST_NAME], $customer->getFirstName());
        self::assertEquals($data[self::LAST_NAME], $customer->getLastName());
        self::assertEquals($data[self::DOC_NUMBER], $customer->getDocNumber());
        self::assertEquals($data[self::DOCUMENT_TYPE_ID], $customer->getDocumentTypeId());
        self::assertEquals($data[self::PHONE_NUMBER], $customer->getPhoneNumber());

    }

    private function getDataOfCustomerWithoutPaymentProfile(): array
    {
        return [
            self::CUSTOMER_ID          => 53479,
            self::CREATED              => '2021-04-06T16:08:43.767',
            self::COMMERCE_CUSTOMER_ID => null,
            self::OWNER                => 'Commerce',
            self::EMAIL                => 'Email222222@bamboopayment.com',
            self::ENABLED              => true,
            self::SHIPPING_ADDRESS     => null,
            self::BILLING_ADDRESS      => $this->getDataOfBillingAddress(),
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
        ];
    }

    private function getDataOfBillingAddress(): array
    {
        return [
            'AddressId'     => 51615,
            'AddressType'   => 1,
            'Country'       => 'UY',
            'State'         => 'Montevideo',
            'AddressDetail' => '10000',
            'PostalCode'    => null,
            'City'          => 'MONTEVIDEO'
        ];
    }

    public function testHydrateWithNoAddress(): void
    {
        $customer = new Customer();
        $data = $this->getDataOfCustomerWithNoAddress();

        /** @var Customer $customer */
        $customer = $customer->hydrate($data);

        self::assertNull($customer->getBillingAddress());
    }

    private function getDataOfCustomerWithNoAddress(): array
    {
        return             [
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
        ];
    }

    public function testHydrateWithPaymentProfile(): void
    {
        $customer = new Customer();
        $data = $this->getDataOfCustomerWithPaymentProfile();

        /** @var Customer $customer */
        $customer = $customer->hydrate($data);


        // make test of payment profile
        $paymentProfiles = $customer->getPaymentProfiles();
        self::assertNotEmpty($paymentProfiles);

        $paymentProfile = $paymentProfiles[0];
        self::assertInstanceOf(PaymentProfile::class, $paymentProfile);
    }

    private function getDataOfCustomerWithPaymentProfile(): array
    {
        return             [
            self::CUSTOMER_ID          => 53479,
            self::CREATED              => '2021-04-06T16:08:43.767',
            self::COMMERCE_CUSTOMER_ID => null,
            self::OWNER                => 'Commerce',
            self::EMAIL                => 'Email222222@bamboopayment.com',
            self::ENABLED              => true,
            self::SHIPPING_ADDRESS     => null,
            self::BILLING_ADDRESS      => $this->getDataOfBillingAddress(),
            self::PLANS                => null,
            self::ADDITIONAL_DATA      => null,
            self::PAYMENT_PROFILES     => [
                $this->getDataOfPaymentProfile()
            ],
            self::CAPTURE_URL          => 'https://testapi.siemprepago.com/v1/Capture/',
            self::UNIQUE_ID            => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
            self::URL                  => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
            self::FIRST_NAME           => 'PrimerNombre 2222',
            self::LAST_NAME            => 'PrimerApellido 2222',
            self::DOC_NUMBER           => '12345672',
            self::DOCUMENT_TYPE_ID     => 2,
            self::PHONE_NUMBER         => '24022330'
        ];
    }

    private function getDataOfPaymentProfile(): array
    {
        return [
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
        ];
    }
}
