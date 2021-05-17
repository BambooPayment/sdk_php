<?php

namespace BambooPaymentTests;

use BambooPayment\Entity\Address;
use BambooPayment\Entity\Customer;
use BambooPayment\Entity\PaymentProfile;
use BambooPayment\Entity\TransactionStep;
use BambooPaymentTests\Entity\AddressEntityTest;
use BambooPaymentTests\Entity\CountryDataUYEntityTest;
use BambooPaymentTests\Entity\CustomerEntityTest;
use BambooPaymentTests\Entity\PaymentProfileEntityTest;
use BambooPaymentTests\Entity\TransactionStepEntityTest;

/**
 * Class SharedDataTest
 * @package BambooPaymentTests
 */
class SharedData extends BaseTest
{
    /**
     * @return array
     */
    protected function getDataOfTransactionStep(): array
    {
        return [
            TransactionStepEntityTest::STEP                    => 'FirstData Authorization with CVV',
            TransactionStepEntityTest::CREATED                 => '2021-05-03T15:22:22.370',
            TransactionStepEntityTest::STATUS                  => 'Approved',
            TransactionStepEntityTest::RESPONSE_CODE           => '0',
            TransactionStepEntityTest::RESPONSE_MESSAGE        => '00',
            TransactionStepEntityTest::ERROR                   => '',
            TransactionStepEntityTest::AUTHORIZATION_CODE      => '123456',
            TransactionStepEntityTest::UNIQUE_ID               => null,
            TransactionStepEntityTest::ACQUIRE_RESPONSE_DETAIL => ['PrimaryResponseCode' => '0', 'SecondaryResponseCode' => '0', 'ISO8583Code' => '00']
        ];
    }

    /**
     * @return array
     */
    protected function getDataOfAddress(): array
    {
        return [
            AddressEntityTest::ADDRESS_ID     => 51615,
            AddressEntityTest::ADDRESS_TYPE   => 1,
            AddressEntityTest::COUNTRY        => 'UY',
            AddressEntityTest::STATE          => 'Montevideo',
            AddressEntityTest::ADDRESS_DETAIL => '10000',
            AddressEntityTest::POSTAL_CODE    => null,
            AddressEntityTest::CITY           => 'MONTEVIDEO'
        ];
    }

    protected function getDataOfPaymentProfile(): array
    {
        return
            [
                PaymentProfileEntityTest::PAYMENT_PROFILE_ID => 55591,
                PaymentProfileEntityTest::PAYMENT_MEDIA_ID   => 2,
                PaymentProfileEntityTest::CREATED            => '2021-04-19T11:26:17.693',
                PaymentProfileEntityTest::LAST_UPDATE        => null,
                PaymentProfileEntityTest::BRAND              => 'MasterCard',
                PaymentProfileEntityTest::CARD_OWNER         => 'Juan Perez',
                PaymentProfileEntityTest::BIN                => null,
                PaymentProfileEntityTest::ISSUER_BANK        => 'Santander',
                PaymentProfileEntityTest::INSTALLMENTS       => '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24',
                PaymentProfileEntityTest::TYPE               => 'CreditCard',
                PaymentProfileEntityTest::ID_COMMERCE_TOKEN  => 0,
                PaymentProfileEntityTest::TOKEN              => null,
                PaymentProfileEntityTest::EXPIRATION         => '202211',
                PaymentProfileEntityTest::LAST4              => '0001',
                PaymentProfileEntityTest::ENABLED            => true,
                PaymentProfileEntityTest::DOCUMENT_NUMBER    => null,
                PaymentProfileEntityTest::DOCUMENT_TYPE_ID   => null
            ];
    }

    protected function getDataOfCustomerWithPaymentProfile(): array
    {
        return [
            CustomerEntityTest::CUSTOMER_ID          => 53479,
            CustomerEntityTest::CREATED              => '2021-04-06T16:08:43.767',
            CustomerEntityTest::COMMERCE_CUSTOMER_ID => null,
            CustomerEntityTest::OWNER                => 'Commerce',
            CustomerEntityTest::EMAIL                => 'Email222222@bamboopayment.com',
            CustomerEntityTest::ENABLED              => true,
            CustomerEntityTest::SHIPPING_ADDRESS     => null,
            CustomerEntityTest::BILLING_ADDRESS      => $this->getDataOfBillingAddress(),
            CustomerEntityTest::PLANS                => null,
            CustomerEntityTest::ADDITIONAL_DATA      => null,
            CustomerEntityTest::PAYMENT_PROFILES     => [
                $this->getDataOfPaymentProfile()
            ],
            CustomerEntityTest::CAPTURE_URL          => 'https://testapi.siemprepago.com/v1/Capture/',
            CustomerEntityTest::UNIQUE_ID            => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
            CustomerEntityTest::URL                  => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
            CustomerEntityTest::FIRST_NAME           => 'PrimerNombre 2222',
            CustomerEntityTest::LAST_NAME            => 'PrimerApellido 2222',
            CustomerEntityTest::DOCUMENT_NUMBER      => '12345672',
            CustomerEntityTest::DOCUMENT_TYPE_ID     => 2,
            CustomerEntityTest::PHONE_NUMBER         => '24022330'
        ];
    }

    protected function getDataOfBillingAddress(): array
    {
        return $this->getDataOfAddress();
    }

    protected function getDataOfDataUy(): array
    {
        return [
            CountryDataUYEntityTest::IS_FINAL_CONSUMER => true,
            CountryDataUYEntityTest::INVOICE           => 1000,
            CountryDataUYEntityTest::TAXABLE_AMOUNT    => '0'
        ];
    }

    /**
     * @param array           $transactionStepData
     * @param TransactionStep $transactionStep
     */
    protected function makeTestOfTransactionStep(array $transactionStepData, $transactionStep): void
    {
        self::assertEquals($transactionStepData[TransactionStepEntityTest::STEP], $transactionStep->getStep());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::CREATED], $transactionStep->getCreated());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::STATUS], $transactionStep->getStatus());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::RESPONSE_CODE], $transactionStep->getResponseCode());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::RESPONSE_MESSAGE], $transactionStep->getResponseMessage());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::ERROR], $transactionStep->getError());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::AUTHORIZATION_CODE], $transactionStep->getAuthorizationCode());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::UNIQUE_ID], $transactionStep->getUniqueId());
    }

    protected function makeTestOfAddress(array $data, Address $address): void
    {
        self::assertEquals($data[AddressEntityTest::ADDRESS_ID], $address->getAddressId());
        self::assertEquals($data[AddressEntityTest::ADDRESS_TYPE], $address->getAddressType());
        self::assertEquals($data[AddressEntityTest::COUNTRY], $address->getCountry());
        self::assertEquals($data[AddressEntityTest::STATE], $address->getState());
        self::assertEquals($data[AddressEntityTest::ADDRESS_DETAIL], $address->getAddressDetail());
        self::assertEquals($data[AddressEntityTest::CITY], $address->getCity());
        self::assertEquals($data[AddressEntityTest::POSTAL_CODE], $address->getPostalCode());
    }

    protected function makeTestOfPaymentProfile(array $data, PaymentProfile $paymentProfile): void
    {
        self::assertEquals($data[PaymentProfileEntityTest::PAYMENT_PROFILE_ID], $paymentProfile->getPaymentProfileId());
        self::assertEquals($data[PaymentProfileEntityTest::PAYMENT_MEDIA_ID], $paymentProfile->getPaymentMediaId());
        self::assertEquals($data[PaymentProfileEntityTest::CREATED], $paymentProfile->getCreated());
        self::assertEquals($data[PaymentProfileEntityTest::BRAND], $paymentProfile->getBrand());
        self::assertEquals($data[PaymentProfileEntityTest::CARD_OWNER], $paymentProfile->getCardOwner());
        self::assertEquals($data[PaymentProfileEntityTest::BIN], $paymentProfile->getBin());
        self::assertEquals($data[PaymentProfileEntityTest::LAST_UPDATE], $paymentProfile->getLastUpdate());
        self::assertEquals($data[PaymentProfileEntityTest::ISSUER_BANK], $paymentProfile->getIssuerBank());
        self::assertEquals($data[PaymentProfileEntityTest::INSTALLMENTS], $paymentProfile->getInstallments());
        self::assertEquals($data[PaymentProfileEntityTest::TYPE], $paymentProfile->getType());
        self::assertEquals($data[PaymentProfileEntityTest::ID_COMMERCE_TOKEN], $paymentProfile->getIdCommerceToken());
        self::assertEquals($data[PaymentProfileEntityTest::TOKEN], $paymentProfile->getToken());
        self::assertEquals($data[PaymentProfileEntityTest::EXPIRATION], $paymentProfile->getExpiration());
        self::assertEquals($data[PaymentProfileEntityTest::LAST4], $paymentProfile->getLast4());
        self::assertEquals($data[PaymentProfileEntityTest::ENABLED], $paymentProfile->isEnabled());
        self::assertEquals($data[PaymentProfileEntityTest::DOCUMENT_NUMBER], $paymentProfile->getDocumentNumber());
        self::assertEquals($data[PaymentProfileEntityTest::DOCUMENT_TYPE_ID], $paymentProfile->getDocumentTypeId());
    }

    protected function makeTestOfCustomer(array $data, $customer): void
    {
        self::assertEquals($data[CustomerEntityTest::CUSTOMER_ID], $customer->getCustomerId());
        self::assertEquals($data[CustomerEntityTest::CREATED], $customer->getCreated());
        self::assertEquals($data[CustomerEntityTest::COMMERCE_CUSTOMER_ID], $customer->getCommerceCustomerId());
        self::assertEquals($data[CustomerEntityTest::OWNER], $customer->getOwner());
        self::assertEquals($data[CustomerEntityTest::EMAIL], $customer->getEmail());
        self::assertEquals($data[CustomerEntityTest::ENABLED], $customer->getEnabled());
        self::assertEquals($data[CustomerEntityTest::ADDITIONAL_DATA], $customer->getAdditionalData());
        self::assertEquals($data[CustomerEntityTest::CAPTURE_URL], $customer->getCaptureURL());
        self::assertEquals($data[CustomerEntityTest::UNIQUE_ID], $customer->getUniqueID());
        self::assertEquals($data[CustomerEntityTest::FIRST_NAME], $customer->getFirstName());
        self::assertEquals($data[CustomerEntityTest::LAST_NAME], $customer->getLastName());
        self::assertEquals($data[CustomerEntityTest::DOCUMENT_NUMBER], $customer->getDocNumber());
        self::assertEquals($data[CustomerEntityTest::DOCUMENT_TYPE_ID], $customer->getDocumentTypeId());
        self::assertEquals($data[CustomerEntityTest::PHONE_NUMBER], $customer->getPhoneNumber());

        /* test for shipping address  */
        self::assertEquals($data[CustomerEntityTest::SHIPPING_ADDRESS], $customer->getShippingAddress());

        /* make test of address */
        $this->makeTestOfAddress($data[CustomerEntityTest::BILLING_ADDRESS], $customer->getBillingAddress());

        /* make test of payment profiles */
        $this->makeTestOfPaymentProfiles($data[CustomerEntityTest::PAYMENT_PROFILES], $customer);
    }

    protected function makeTestOfPaymentProfiles(array $dataPaymentProfiles, Customer $customer): void
    {
        $customerPaymentProfiles = $customer->getPaymentProfiles();
        if ($customerPaymentProfiles !== null) {
            foreach ($customerPaymentProfiles as $index => $customerPaymentProfile) {
                $this->makeTestOfPaymentProfile($dataPaymentProfiles[$index], $customerPaymentProfile);
            }
        }
    }
}
