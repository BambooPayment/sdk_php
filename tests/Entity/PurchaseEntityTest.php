<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Purchase;
use BambooPaymentTests\BaseTest;

class PurchaseEntityTest extends BaseTest
{
    public function testHydrate(): void
    {
        $purchase = new Purchase();

        $purchase = $purchase->hydrate(
            [
                'PurchaseId'               => 90511,
                'Created'                  => '2021-04-15T14:25:33.946',
                'TrxToken'                 => null,
                'Order'                    => '12345678',
                'Transaction'              => [
                    'TransactionID'       => 99021,
                    'Created'             => '2021-04-15T14:25:33.937',
                    'AuthorizationDate'   => '',
                    'TransactionStatusId' => 3,
                    'Status'              => 'PreAuthorized',
                    'ErrorCode'           => '',
                    'Description'         => null,
                    'ApprovalCode'        => '123456',
                    'Steps'               => [
                        [
                            'Step'                   => 'FirstData Pre-Authorization with CVV',
                            'Created'                => '2021-04-15T14:25:35.067',
                            'Status'                 => 'Pre-authorizacion OK',
                            'ResponseCode'           => '0',
                            'ResponseMessage'        => '00',
                            'Error'                  => '',
                            'AuthorizationCode'      => '123456',
                            'UniqueID'               => null,
                            'AcquirerResponseDetail' => ['PrimaryResponseCode' => '0', 'SecondaryResponseCode' => '0', 'ISO8583Code' => '00']
                        ]
                    ]
                ],
                'Capture'                  => false,
                'Amount'                   => 10000,
                'OriginalAmount'           => 10000,
                'TaxableAmount'            => 0,
                'Tip'                      => 0,
                'Installments'             => 1,
                'Currency'                 => 'UYU',
                'Description'              => null,
                'Customer'                 => [
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
                'RefundList'               => null,
                'PlanID'                   => null,
                'UniqueID'                 => null,
                'AdditionalData'           => null,
                'CustomerUserAgent'        => null,
                'CustomerIP'               => null,
                'URL'                      => 'https://testapi.siemprepago.com/v1/api/Purchase/90511',
                'DataUY'                   => [
                    'IsFinalConsumer' => true,
                    'Invoice'         => '1000',
                    'TaxableAmount'   => 0
                ],
                'DataDO'                   => null,
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
