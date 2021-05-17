<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\PaymentProfile;
use BambooPaymentTests\SharedData;

/**
 * Class PaymentProfileEntityTest
 * @package BambooPaymentTests\Entity
 */
class PaymentProfileEntityTest extends SharedData
{
    protected const PAYMENT_PROFILE_ID = 'PaymentProfileId';
    protected const PAYMENT_MEDIA_ID   = 'PaymentMediaId';
    protected const CREATED            = 'Created';
    protected const LAST_UPDATE        = 'LastUpdate';
    protected const BRAND              = 'Brand';
    protected const CARD_OWNER         = 'CardOwner';
    protected const BIN                = 'Bin';
    protected const ISSUER_BANK        = 'IssuerBank';
    protected const INSTALLMENTS       = 'Installments';
    protected const TYPE               = 'Type';
    protected const ID_COMMERCE_TOKEN  = 'IdCommerceToken';
    protected const TOKEN              = 'Token';
    protected const EXPIRATION         = 'Expiration';
    protected const LAST4              = 'Last4';
    protected const ENABLED            = 'Enabled';
    protected const DOCUMENT_NUMBER    = 'DocumentNumber';
    protected const DOCUMENT_TYPE_ID   = 'DocumentTypeId';


    public function testHydrate(): void
    {
        $paymentProfile = new PaymentProfile();
        $data           = $this->getDataOfPaymentProfile();

        /** @var PaymentProfile $paymentProfile */
        $paymentProfile = $paymentProfile->hydrate($data);

        $this->makeTestOfPaymentProfile($data, $paymentProfile);
    }
}
