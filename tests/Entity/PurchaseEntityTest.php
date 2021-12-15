<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Purchase;
use BambooPaymentTests\SharedData;

/**
 * Class PurchaseEntityTest
 * @package BambooPaymentTests\Entity
 */
class PurchaseEntityTest extends SharedData
{
    /*** Entity attributes keys  ***/
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

    /*** TransactionEntity attributes keys  ***/
    private const TRANSACTION_ID          = TransactionEntityTest::TRANSACTION_ID;
    private const CREATED_TRANSACTION     = TransactionEntityTest::CREATED;
    private const AUTHORIZATION_DATE      = TransactionEntityTest::AUTHORIZATION_DATE;
    private const TRANSACTION_STATUS_ID   = TransactionEntityTest::TRANSACTION_STATUS_ID;
    private const STATUS                  = TransactionEntityTest::STATUS;
    private const ERROR_CODE              = TransactionEntityTest::ERROR_CODE;
    private const DESCRIPTION_TRANSACTION = TransactionEntityTest::DESCRIPTION;
    private const APPROVAL_CODE           = TransactionEntityTest::APPROVAL_CODE;
    private const STEPS                   = TransactionEntityTest::STEPS;

    /*** AddressEntity attributes keys  ***/
    public const ADDRESS_ID     = AddressEntityTest::ADDRESS_ID;
    public const ADDRESS_TYPE   = AddressEntityTest::ADDRESS_TYPE;
    public const COUNTRY        = AddressEntityTest::COUNTRY;
    public const STATE          = AddressEntityTest::STATE;
    public const ADDRESS_DETAIL = AddressEntityTest::ADDRESS_DETAIL;
    public const POSTAL_CODE    = AddressEntityTest::POSTAL_CODE;
    public const CITY           = AddressEntityTest::CITY;

    /*** Acquirer  ***/

    /*** DataUYEntity attributes keys  ***/


    /*** PaymentProfileEntity attribute keys ***/

    public function testHydrate(): void
    {
        $purchase = new Purchase();
        $data     = $this->getDataOfPurchase();

        $purchase = $purchase->hydrate($data);

        self::assertEquals($data[self::PURCHASE_ID], $purchase->getPurchaseId());
        self::assertEquals($data[self::CREATED], $purchase->getCreated());
        self::assertNull($purchase->getTrxToken());
        self::assertEquals($data[self::ORDER], $purchase->getOrder());
        self::assertFalse($purchase->isCapture());
        self::assertEquals($data[self::AMOUNT], $purchase->getAmount());
        self::assertEquals($data[self::ORIGINAL_AMOUNT], $purchase->getOriginalAmount());
        self::assertEquals($data[self::TAXABLE_AMOUNT], $purchase->getTaxableAmount());
        self::assertEquals($data[self::TIP], $purchase->getTip());
        self::assertEquals($data[self::INSTALLMENTS], $purchase->getInstallments());
        self::assertEquals($data[self::CURRENCY], $purchase->getCurrency());
        self::assertNull($purchase->getDescription());
        self::assertEmpty($purchase->getRefundList());
        self::assertNull($purchase->getPlanID());
        self::assertNull($purchase->getUniqueID());
        self::assertEmpty($purchase->getAdditionalData());
        self::assertNull($purchase->getCustomerUserAgent());
        self::assertNull($purchase->getCustomerIP());
        self::assertEquals($data[self::URL], $purchase->getURL());
        self::assertNull($purchase->getLoyaltyPlan());
        self::assertNull($purchase->getDeviceFingerprId());
        self::assertEquals($data[self::PURCHASE_PAYMENT_PROFILE_ID], $purchase->getPurchasePaymentProfileId());
        self::assertNull($purchase->getDataDO());
        self::assertNull($purchase->getCommerceAction());

        /* Make test of Transaction embedded */
        self::assertNotEmpty($purchase->getTransaction());

        /* Make test of dataUY embedded */
        self::assertNotEmpty($purchase->getDataUY());

        /* Make test of Acquirer */
        self::assertNotEmpty($purchase->getAcquirer());

        /* Make test to of customer embedded */
        $this->makeTestOfCustomer($data[self::CUSTOMER], $purchase->getCustomer());
    }

    private function getDataOfPurchase(): array
    {
        return [
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
            self::CUSTOMER                    => $this->getDataOfCustomerWithPaymentProfile(),
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
        ];
    }

    private function getDataOfAcquirer(): array
    {
        return [
            'AcquirerID'     => 1,
            'Name'           => 'FirstData',
            'CommerceNumber' => null
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
                $this->getDataOfTransactionStep()
            ]
        ];
    }
}
