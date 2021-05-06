<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Purchase;
use BambooPaymentTests\BaseTest;

class PurchaseEntityTest extends BaseTest
{
    /** const to keys of Purchase  **/
    public const  CUSTOMER        = Purchase::CUSTOMER;
    public const  TRANSACTION     = Purchase::TRANSACTION;
    public const  DATA_UY         = Purchase::DATA_UY;
    public const  DATA_DO         = Purchase::DATA_DO;
    public const  REFUND_LIST     = Purchase::REFUND_LIST;
    private const PURCHASE_ID     = 'PurchaseId';
    private const CREATED         = 'Created';
    private const TRX_TOKEN       = 'TrxToken';
    private const ORDER           = 'Order';
    private const AMOUNT          = 'Amount';
    private const CAPTURE         = 'Capture';
    private const ORIGINAL_AMOUNT = 'OriginalAmount';
    private const TAXABLE_AMOUNT  = 'TaxableAmount';
    private const TIP             = 'Tip';
    private const INSTALLMENTS    = 'Installments';
    private const CURRENCY        = 'Currency';
    private const DESCRIPTION     = 'Description';

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
    private const UNIQUE_ID               = TransactionStepEntityTest::UNIQUE_ID;
    private const ACQUIRE_RESPONSE_DETAIL = TransactionStepEntityTest::ACQUIRE_RESPONSE_DETAIL;


    /** const to keys of Customer  **/

    /** const to keys of BillingAddress  **/

    /** const to keys of PaymentProfile  **/

    public function testHydrate(): void
    {
        $purchase = new Purchase();

        $purchase = $purchase->hydrate(
            [
                self::PURCHASE_ID          => 90511,
                self::CREATED              => '2021-04-15T14:25:33.946',
                self::TRX_TOKEN            => null,
                self::ORDER                => '12345678',
                self::TRANSACTION          => [
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
                            self::UNIQUE_ID               => null,
                            self::ACQUIRE_RESPONSE_DETAIL => ['PrimaryResponseCode' => '0', 'SecondaryResponseCode' => '0', 'ISO8583Code' => '00']
                        ]
                    ]
                ],
                self::CAPTURE              => false,
                self::AMOUNT               => 10000,
                self::ORIGINAL_AMOUNT      => 10000,
                self::TAXABLE_AMOUNT       => 0,
                self::TIP                  => 0,
                self::INSTALLMENTS         => 1,
                self::CURRENCY             => 'UYU',
                self::DESCRIPTION          => null,
                self::CUSTOMER             => [
                    'CustomerId'         => 53775,
                    'Created'            => '2021-04-15T14=>25=>23.240',
                    'CommerceCustomerId' => null,
                    'Owner'              => 'Anonymous',
                    'Email'              => 'juanperez123@bamboopayment.com',
                    'Enabled'            => true,
                    'ShippingAddress'    => null,
                    'BillingAddress'     => [
                        'AddressId'     => 0,
                        'AddressType'   => 1,
                        'Country'       => 'Uruguay',
                        'State'         => 'Montevideo',
                        'AddressDetail' => 'Av. Sarmiento 2260',
                        'PostalCode'    => null,
                        'City'          => 'MONTEVIDEO'
                    ],
                    'Plans'              => null,
                    'AdditionalData'     => null,
                    'PaymentProfiles'    => [
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
                    'CaptureURL'         => null,
                    'UniqueID'           => null,
                    'URL'                => 'https://testapi.siemprepago.com/v1/api/Customer/53775',
                    'FirstName'          => 'Juan',
                    'LastName'           => 'Perez',
                    'DocNumber'          => '12345672',
                    'DocumentTypeId'     => 2,
                    'PhoneNumber'        => '24022330'
                ],
                self::REFUND_LIST          => null,
                'PlanID'                   => null,
                'UniqueID'                 => null,
                'AdditionalData'           => null,
                'CustomerUserAgent'        => null,
                'CustomerIP'               => null,
                'URL'                      => 'https://testapi.siemprepago.com/v1/api/Purchase/90511',
                self::DATA_UY              => [
                    'IsFinalConsumer' => true,
                    'Invoice'         => '1000',
                    'TaxableAmount'   => 0
                ],
                self::DATA_DO              => null,
                'Acquirer'                 => [
                    'AcquirerID'     => 1,
                    'Name'           => 'FirstData',
                    'CommerceNumber' => null
                ],
                'CommerceAction'           => null,
                'PurchasePaymentProfileId' => 55501,
                'LoyaltyPlan'              => null,
                'DeviceFingerprintId'      => null
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
}
