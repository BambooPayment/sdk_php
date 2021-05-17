<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\CardData;
use BambooPaymentTests\BaseTest;

/**
 * Class CardDataEntityTest
 * @package BambooPaymentTests\Entity
 */
class CardDataEntityTest extends BaseTest
{
    /*** Entity attributes keys ***/
    private const CARDHOLDER_NAME = 'CardholderName';
    private const PAN             = 'Pan';
    private const CVV             = 'CVV';
    private const EXPIRATION      = 'Expiration';
    private const EMAIL           = 'Email';
    private const DOCUMENT        = 'Document';

    public function testHydrate(): void
    {
        $cardData = new CardData();
        $data            = $this->getDataOfCardData();
        $cardData = $cardData->hydrate($data);

        self::assertInstanceOf(CardData::class, $cardData);
        self::assertEquals($data[self::CARDHOLDER_NAME], $cardData->getCardholderName());
        self::assertEquals($data[self::PAN], $cardData->getPan());
        self::assertEquals($data[self::CVV], $cardData->getCVV());
        self::assertEquals($data[self::EXPIRATION], $cardData->getExpiration());
        self::assertEquals($data[self::EMAIL], $cardData->getEmail());
        self::assertEquals($data[self::DOCUMENT], $cardData->getDocument());
    }

    private function getDataOfCardData(): array
    {
        return [
            self::CARDHOLDER_NAME => 'FirstData Authorization with CVV',
            self::PAN             => '2021-05-03T15:22:22.370',
            self::CVV             => 'Approved',
            self::EXPIRATION      => '0',
            self::EMAIL           => '00',
            self::DOCUMENT        => '',
        ];
    }
}
