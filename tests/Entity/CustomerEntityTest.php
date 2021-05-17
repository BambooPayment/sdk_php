<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Customer;
use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\SharedData;

/**
 * Class CustomerEntityTest
 * @package BambooPaymentTests\Entity
 */
class CustomerEntityTest extends SharedData
{
    /*** Entity attributes keys ***/
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
    public const DOCUMENT_NUMBER      = 'DocNumber';
    public const DOCUMENT_TYPE_ID     = 'DocumentTypeId';
    public const PHONE_NUMBER         = 'PhoneNumber';


    public function testHydrate(): void
    {
        $customer = new Customer();
        $data     = $this->getDataOfCustomerWithoutPaymentProfile();

        /** @var Customer $customer */
        $customer = $customer->hydrate($data);
        $this->makeTestOfCustomer($data, $customer);
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
            self::DOCUMENT_NUMBER      => '12345672',
            self::DOCUMENT_TYPE_ID     => 2,
            self::PHONE_NUMBER         => '24022330'
        ];
    }

    public function testHydrateWithNoAddress(): void
    {
        $customer = new Customer();
        $data     = $this->getDataOfCustomerWithNoAddress();

        /** @var Customer $customer */
        $customer = $customer->hydrate($data);

        self::assertNull($customer->getBillingAddress());
    }

    private function getDataOfCustomerWithNoAddress(): array
    {
        return [
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
            self::DOCUMENT_NUMBER      => '12345672',
            self::DOCUMENT_TYPE_ID     => 2,
            self::PHONE_NUMBER         => '24022330'
        ];
    }

    public function testHydrateWithPaymentProfile(): void
    {
        $customer = new Customer();
        $data     = $this->getDataOfCustomerWithPaymentProfile();

        /** @var Customer $customer */
        $customer = $customer->hydrate($data);

        // make test of payment profile
        $paymentProfiles = $customer->getPaymentProfiles();
        self::assertNotEmpty($paymentProfiles);
        $this->makeTestOfPaymentProfiles($data[self::PAYMENT_PROFILES], $customer);

        $paymentProfile = $paymentProfiles[0];
        self::assertInstanceOf(PaymentProfile::class, $paymentProfile);
    }
}
