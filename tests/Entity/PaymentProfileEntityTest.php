<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\BaseTest;

class PaymentProfileEntityTest extends BaseTest
{
    public function testHydrate(): void
    {
        $paymentProfile = new PaymentProfile();

        /** @var PaymentProfile $paymentProfile */
        $paymentProfile = $paymentProfile->hydrate(
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
                'Enabled'          => true,
                'DocumentNumber'   => null,
                'DocumentTypeId'   => null
            ]
        );

        self::assertEquals(55591, $paymentProfile->getPaymentProfileId());
        self::assertEquals(2, $paymentProfile->getPaymentMediaId());
        self::assertEquals('2021-04-19T11:26:17.693', $paymentProfile->getCreated());
        self::assertEquals('MasterCard', $paymentProfile->getBrand());
        self::assertEquals('Juan Perez', $paymentProfile->getCardOwner());
        self::assertNull($paymentProfile->getBin());
        self::assertNull($paymentProfile->getLastUpdate());
        self::assertEquals('Santander', $paymentProfile->getIssuerBank());
        self::assertEquals('1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24', $paymentProfile->getInstallments());
        self::assertEquals('CreditCard', $paymentProfile->getType());
        self::assertEquals(0, $paymentProfile->getIdCommerceToken());
        self::assertNull($paymentProfile->getToken());
        self::assertEquals('202211', $paymentProfile->getExpiration());
        self::assertEquals('0001', $paymentProfile->getLast4());
        self::assertTrue($paymentProfile->isEnabled());
        self::assertNull($paymentProfile->getDocumentNumber());
        self::assertNull($paymentProfile->getDocumentTypeId());

    }
}
