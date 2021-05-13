<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\BaseTest;

/**
 * Class PaymentProfileEntityTest
 * @package BambooPaymentTests\Entity
 */
class PaymentProfileEntityTest extends BaseTest
{
    private const PAYMENT_PROFILE_ID = 'PaymentProfileId';
    private const PAYMENT_MEDIA_ID   = 'PaymentMediaId';
    private const CREATED            = 'Created';
    private const LAST_UPDATE        = 'LastUpdate';
    private const BRAND              = 'Brand';
    private const CARD_OWNER         = 'CardOwner';
    private const BIN                = 'Bin';
    private const ISSUER_BANK        = 'IssuerBank';
    private const INSTALLMENTS       = 'Installments';
    private const TYPE               = 'Type';
    private const ID_COMMERCE_TOKEN  = 'IdCommerceToken';
    private const TOKEN              = 'Token';
    private const EXPIRATION         = 'Expiration';
    private const LAST4              = 'Last4';
    private const ENABLED            = 'Enabled';
    private const DOCUMENT_NUMBER    = 'DocumentNumber';
    private const DOCUMENT_TYPE_ID   = 'DocumentTypeId';


    public function testHydrate(): void
    {
        $paymentProfile = new PaymentProfile();
        $data           = $this->getDataOfPaymentProfile();

        /** @var PaymentProfile $paymentProfile */
        $paymentProfile = $paymentProfile->hydrate($data);

        self::assertEquals($data[self::PAYMENT_PROFILE_ID], $paymentProfile->getPaymentProfileId());
        self::assertEquals($data[self::PAYMENT_MEDIA_ID], $paymentProfile->getPaymentMediaId());
        self::assertEquals($data[self::CREATED], $paymentProfile->getCreated());
        self::assertEquals($data[self::BRAND], $paymentProfile->getBrand());
        self::assertEquals($data[self::CARD_OWNER], $paymentProfile->getCardOwner());
        self::assertNull($paymentProfile->getBin());
        self::assertNull($paymentProfile->getLastUpdate());
        self::assertEquals($data[self::ISSUER_BANK], $paymentProfile->getIssuerBank());
        self::assertEquals($data[self::INSTALLMENTS], $paymentProfile->getInstallments());
        self::assertEquals($data[self::TYPE], $paymentProfile->getType());
        self::assertEquals($data[self::ID_COMMERCE_TOKEN], $paymentProfile->getIdCommerceToken());
        self::assertNull($paymentProfile->getToken());
        self::assertEquals($data[self::EXPIRATION], $paymentProfile->getExpiration());
        self::assertEquals($data[self::LAST4], $paymentProfile->getLast4());
        self::assertTrue($paymentProfile->isEnabled());
        self::assertNull($paymentProfile->getDocumentNumber());
        self::assertNull($paymentProfile->getDocumentTypeId());
    }

    private function getDataOfPaymentProfile(): array
    {
        return
            [
                self::PAYMENT_PROFILE_ID => 55591,
                self::PAYMENT_MEDIA_ID   => 2,
                self::CREATED            => '2021-04-19T11:26:17.693',
                self::LAST_UPDATE        => null,
                self::BRAND              => 'MasterCard',
                self::CARD_OWNER         => 'Juan Perez',
                self::BIN                => null,
                self::ISSUER_BANK        => 'Santander',
                self::INSTALLMENTS       => '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24',
                self::TYPE               => 'CreditCard',
                self::ID_COMMERCE_TOKEN  => 0,
                self::TOKEN              => null,
                self::EXPIRATION         => '202211',
                self::LAST4              => '0001',
                self::ENABLED            => true,
                self::DOCUMENT_NUMBER    => null,
                self::DOCUMENT_TYPE_ID   => null
            ];
    }
}
