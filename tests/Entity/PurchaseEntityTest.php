<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Purchase;
use BambooPaymentTests\BaseTest;

/**
 * Class PurchaseEntityTest
 * @package BambooPaymentTests\Entity
 */
class PurchaseEntityTest extends BaseTest
{
    /** const to keys of Purchase  **/
    public const  CUSTOMER                    = Purchase::CUSTOMER;
    public const  TRANSACTION                 = Purchase::TRANSACTION;
    public const  DATA_UY                     = Purchase::DATA_UY;
    public const  DATA_DO                     = Purchase::DATA_DO;
    public const  ACQUIRER                    = 'Acquirer';
    private const PURCHASE_ID                 = 'PurchaseId';
    private const CREATED                     = 'Created';
    private const TRX_TOKEN                   = 'TrxToken';
    private const ORDER                       = 'Order';
    private const CAPTURE                     = 'Capture';
    private const AMOUNT                      = 'Amount';
    private const ORIGINAL_AMOUNT             = 'OriginalAmount';
    private const TAXABLE_AMOUNT              = 'TaxableAmount';
    private const TIP                         = 'Tip';
    private const INSTALLMENTS                = 'Installments';
    private const CURRENCY                    = 'Currency';
    private const DESCRIPTION                 = 'Description';
    public const  REFUND_LIST                 = Purchase::REFUND_LIST;
    private const PLAN_ID                     = 'PlanID';
    private const UNIQUE_ID                   = 'UniqueID';
    private const ADDITIONAL_DATA             = 'AditionalData';
    private const CUSTOMER_USER_AGENT         = 'CustomerUserAgent';
    private const CUSTOMER_IP                 = 'CustomerIP';
    private const URL                         = 'URL';
    private const COMMERCE_ACTION             = 'CommerceAction';
    private const PURCHASE_PAYMENT_PROFILE_ID = 'PurchasePaymentProfileId';
    private const LOLYTA_PLAN                 = 'LolytaPlan';
    private const DEVICE_FINGERPRINT_IDd      = 'DeviceFingerprintId';

    /** const to keys of Transaction  **/
    private const TRANSACTION_ID          = TransactionEntityTest::TRANSACTION_ID;
    private const CREATED_TRANSACTION     = TransactionEntityTest::CREATED;
    private const AUTHORIZATION_DATE      = TransactionEntityTest::AUTHORIZATION_DATE;
    private const TRANSACTION_STATUS_ID   = TransactionEntityTest::TRANSACTION_STATUS_ID;
    private const STATUS                  = TransactionEntityTest::STATUS;
    private const ERROR_CODE              = TransactionEntityTest::ERROR_CODE;
    private const DESCRIPTION_TRANSACTION = TransactionEntityTest::DESCRIPTION;
    private const APPROVAL_CODE           = TransactionEntityTest::APPROVAL_CODE;
    private const STEPS                   = TransactionEntityTest::STEPS;

    /** const to keys of Steps  **/
    private const STEP                    = TransactionStepEntityTest::STEP;
    private const CREATED_STEP            = TransactionStepEntityTest::CREATED;
    private const STATUS_STEP             = TransactionStepEntityTest::STATUS;
    private const RESPONSE_CODE           = TransactionStepEntityTest::RESPONSE_CODE;
    private const RESPONSE_MESSAGE        = TransactionStepEntityTest::RESPONSE_MESSAGE;
    private const ERROR                   = TransactionStepEntityTest::ERROR;
    private const AUTHORIZATION_CODE      = TransactionStepEntityTest::AUTHORIZATION_CODE;
    private const STEP_UNIQUE_ID          = TransactionStepEntityTest::UNIQUE_ID;
    private const ACQUIRE_RESPONSE_DETAIL = TransactionStepEntityTest::ACQUIRE_RESPONSE_DETAIL;

    /** const to keys of Customer  **/
    private const CUSTOMER_ID              = CustomerEntityTest::CUSTOMER_ID;
    private const CUSTOMER_CREATED         = CustomerEntityTest::CREATED;
    private const COMMERCE_CUSTOMER_ID     = CustomerEntityTest::COMMERCE_CUSTOMER_ID;
    private const OWNER                    = CustomerEntityTest::OWNER;
    private const EMAIL                    = CustomerEntityTest::EMAIL;
    private const ENABLED                  = CustomerEntityTest::ENABLED;
    private const SHIPPING_ADDRESS         = CustomerEntityTest::SHIPPING_ADDRESS;
    private const BILLING_ADDRESS          = CustomerEntityTest::BILLING_ADDRESS;
    private const PLANS                    = CustomerEntityTest::PLANS;
    private const CUSTOMER_ADDITIONAL_DATA = CustomerEntityTest::ADDITIONAL_DATA;
    private const PAYMENT_PROFILES         = CustomerEntityTest::PAYMENT_PROFILES;
    private const CAPTURE_URL              = CustomerEntityTest::CAPTURE_URL;
    private const CUSTOMER_UNIQUE_ID       = CustomerEntityTest::UNIQUE_ID;
    private const CUSTOMER_URL             = CustomerEntityTest::URL;
    private const FIRST_NAME               = CustomerEntityTest::FIRST_NAME;
    private const LAST_NAME                = CustomerEntityTest::LAST_NAME;
    private const DOC_NUMBER               = CustomerEntityTest::DOC_NUMBER;
    private const DOCUMENT_TYPE_ID         = CustomerEntityTest::DOCUMENT_TYPE_ID;
    private const PHONE_NUMBER             = CustomerEntityTest::PHONE_NUMBER;

    /** const to keys of Address  **/
    public const ADDRESS_ID     = AddressEntityTest::ADDRESS_ID;
    public const ADDRESS_TYPE   = AddressEntityTest::ADDRESS_TYPE;
    public const COUNTRY        = AddressEntityTest::COUNTRY;
    public const STATE          = AddressEntityTest::STATE;
    public const ADDRESS_DETAIL = AddressEntityTest::ADDRESS_DETAIL;
    public const POSTAL_CODE    = AddressEntityTest::POSTAL_CODE;
    public const CITY           = AddressEntityTest::CITY;

    /** const to keys of Acquirer  **/

    /** const to keys of DataUY  **/


    /** const to keys of PaymentProfile  **/

    public function testHydrate(): void
    {
        $purchase = new Purchase();

        $purchase = $purchase->hydrate(
            [
                self::PURCHASE_ID                 => 90511,
                self::CREATED                     => '2021-04-15T14:25:33.946',
                self::TRX_TOKEN                   => null,
                self::ORDER                       => '12345678',
                self::TRANSACTION                 => $this->getDataOfTransaction(),
                self::CAPTURE                     => false,
                self::AMOUNT                      => 10000,
                self::ORIGINAL_AMOUNT             => 10000,
                self::TAXABLE_AMOUNT              => 0,
                self::TIP                         => 0,
                self::INSTALLMENTS                => 1,
                self::CURRENCY                    => 'UYU',
                self::DESCRIPTION                 => null,
                self::CUSTOMER                    => $this->getDataOfCustomer(),
                self::REFUND_LIST                 => null,
                self::PLAN_ID                     => null,
                self::UNIQUE_ID                   => null,
                self::ADDITIONAL_DATA             => null,
                self::CUSTOMER_USER_AGENT         => null,
                self::CUSTOMER_IP                 => null,
                self::URL                         => 'https://testapi.siemprepago.com/v1/api/Purchase/90511',
                self::DATA_UY                     => $this->getDataOfDataUY(),
                self::DATA_DO                     => null,
                self::ACQUIRER                    => $this->getDataOfAcquirer(),
                self::COMMERCE_ACTION             => null,
                self::PURCHASE_PAYMENT_PROFILE_ID => 55501,
                self::LOLYTA_PLAN                 => null,
                self::DEVICE_FINGERPRINT_IDd      => null
            ]
        );

        self::assertEquals(90511, $purchase->getPurchaseId());
        self::assertEquals('2021-04-15T14:25:33.946', $purchase->getCreated());
        self::assertNull($purchase->getTrxToken());
        self::assertEquals('12345678', $purchase->getOrder());
        self::assertNotEmpty($purchase->getTransaction());
        self::assertFalse($purchase->isCapture());
        self::assertEquals(10000, $purchase->getAmount());
        self::assertEquals(10000, $purchase->getOriginalAmount());
        self::assertEquals(0, $purchase->getTaxableAmount());
        self::assertEquals(0, $purchase->getTip());
        self::assertEquals(1, $purchase->getInstallments());
        self::assertEquals('UYU', $purchase->getCurrency());
        self::assertNull($purchase->getDescription());
        self::assertEmpty($purchase->getRefundList());
        self::assertEmpty($purchase->getRefundList());
        self::assertNull($purchase->getPlanID());
        self::assertNull($purchase->getUniqueID());
        self::assertEmpty($purchase->getAdditionalData());
        self::assertEmpty($purchase->getAdditionalData());
        self::assertNull($purchase->getCustomerUserAgent());
        self::assertNull($purchase->getCustomerIP());
        self::assertEquals('https://testapi.siemprepago.com/v1/api/Purchase/90511', $purchase->getURL());
        self::assertNotEmpty($purchase->getDataUY());
        self::assertNull($purchase->getDataDO());
        self::assertNotEmpty($purchase->getAcquirer());
        self::assertNull($purchase->getCommerceAction());
        self::assertEquals(55501, $purchase->getPurchasePaymentProfileId());
        self::assertNull($purchase->getLoyaltyPlan());
        self::assertNull($purchase->getDeviceFingerprId());
        self::assertEquals(53775, $purchase->getCustomer()->getCustomerId());
    }

    private function getDataOfAcquirer(): array
    {
        return [
            'AcquirerID'     => 1,
            'Name'           => 'FirstData',
            'CommerceNumber' => null
        ];
    }

    private function getDataOfDataUY(): array
    {
        return [
            'IsFinalConsumer' => true,
            'Invoice'         => '1000',
            'TaxableAmount'   => 0
        ];
    }

    private function getDataOfTransaction(): array
    {
        return [
            self::TRANSACTION_ID          => 99021,
            self::CREATED_TRANSACTION     => '2021-04-15T14:25:33.937',
            self::AUTHORIZATION_DATE      => '',
            self::TRANSACTION_STATUS_ID   => 3,
            self::STATUS                  => 'PreAuthorized',
            self::ERROR_CODE              => '',
            self::DESCRIPTION_TRANSACTION => null,
            self::APPROVAL_CODE           => '123456',
            self::STEPS                   => [
                [
                    self::STEP                    => 'FirstData Pre-Authorization with CVV',
                    self::CREATED                 => '2021-04-15T14:25:35.067',
                    self::STATUS                  => 'Pre-authorizacion OK',
                    self::RESPONSE_CODE           => '0',
                    self::RESPONSE_MESSAGE        => '00',
                    self::ERROR                   => '',
                    self::AUTHORIZATION_CODE      => '123456',
                    self::STEP_UNIQUE_ID          => null,
                    self::ACQUIRE_RESPONSE_DETAIL => ['PrimaryResponseCode' => '0', 'SecondaryResponseCode' => '0', 'ISO8583Code' => '00']
                ]
            ]
        ];
    }

    private function getDataOfCustomer(): array
    {
        return [
            self::CUSTOMER_ID          => 53775,
            self::CUSTOMER_CREATED     => '2021-04-15T14=>25=>23.240',
            self::COMMERCE_CUSTOMER_ID => null,
            self::OWNER                => 'Anonymous',
            self::EMAIL                => 'juanperez123@bamboopayment.com',
            self::ENABLED              => true,
            self::SHIPPING_ADDRESS     => null,
            self::BILLING_ADDRESS      => [
                self::ADDRESS_ID     => 0,
                self::ADDRESS_TYPE   => 1,
                self::COUNTRY        => 'Uruguay',
                self::STATE          => 'Montevideo',
                self::ADDRESS_DETAIL => 'Av. Sarmiento 2260',
                self::POSTAL_CODE    => null,
                self::CITY           => 'MONTEVIDEO'
            ],
            self::PLANS                => null,
            self::ADDITIONAL_DATA      => null,
            self::PAYMENT_PROFILES     => [
                [
                    'PaymentProfileId' => 55501,
                    'PaymentMediaId'   => 2,
                    'Created'          => '2021-04-15T17=>25=>23.240',
                    'LastUpdate'       => null,
                    'Brand'            => 'MasterCard',
                    'CardOwner'        => 'AAA',
                    'Bin'              => null,
                    'IssuerBank'       => 'Santander',
                    'Installments'     => '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24',
                    'Type'             => 'CreditCard',
                    'IdCommerceToken'  => 0,
                    'Token'            => null,
                    'Expiration'       => '202212',
                    'Last4'            => '0001',
                    'Enabled'          => null,
                    'DocumentNumber'   => null,
                    'DocumentTypeId'   => null
                ]
            ],
            self::CAPTURE_URL          => null,
            self::CUSTOMER_UNIQUE_ID   => null,
            self::URL                  => 'https://testapi.siemprepago.com/v1/api/Customer/53775',
            self::FIRST_NAME           => 'Juan',
            self::LAST_NAME            => 'Perez',
            self::DOC_NUMBER           => '12345672',
            self::DOCUMENT_TYPE_ID     => 2,
            self::PHONE_NUMBER         => '24022330'
        ];
    }
}
