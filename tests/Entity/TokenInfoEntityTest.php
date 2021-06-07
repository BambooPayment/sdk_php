<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\TokenInfo;
use BambooPaymentTests\BaseTest;

/**
 * Class TokenInfoEntityTest
 * @package BambooPaymentTests\Entity
 */
class TokenInfoEntityTest extends BaseTest
{
    private const TOKEN_ID       = 'TokenId';
    private const CREATED        = 'Created';
    private const TYPE           = 'Type';
    private const BRAND          = 'Brand';
    private const ISSUE_BANK     = 'IssueBank';
    private const OWNER          = 'Owner';
    private const LAST4          = 'Last4';
    private const CARD_TYPE      = 'CardType';
    private const CARD_EXP_MONTH = 'CardExpMonth';
    private const CARD_EXP_YEAR  = 'CardExpYear';


    public function testHydrate(): void
    {
        $tokenInfo = new TokenInfo();
        $data      = $this->getDataOfTokenInfo();

        /** @var TokenInfo $tokenInfo */
        $tokenInfo = $tokenInfo->hydrate($data);

        self::assertEquals($data[self::TOKEN_ID], $tokenInfo->getTokenId());
        self::assertEquals($data[self::CREATED], $tokenInfo->getCreated());
        self::assertEquals($data[self::TYPE], $tokenInfo->getType());
        self::assertEquals($data[self::BRAND], $tokenInfo->getBrand());
        self::assertEquals($data[self::ISSUE_BANK], $tokenInfo->getIssueBank());
        self::assertEquals($data[self::OWNER], $tokenInfo->getOwner());
        self::assertEquals($data[self::LAST4], $tokenInfo->getLast4());
        self::assertEquals($data[self::CARD_TYPE], $tokenInfo->getCardType());
        self::assertEquals($data[self::CARD_EXP_MONTH], $tokenInfo->getCardExpMonth());
        self::assertEquals($data[self::CARD_EXP_YEAR], $tokenInfo->getCardExpYear());
    }

    private function getDataOfTokenInfo(): array
    {
        return [
            self::TOKEN_ID       => 'OT__-EOkUtu6TdI5YH7qlooxDglPC5dEbgQ94jiYpVJ8SzQ_',
            self::CREATED        => '021-04-06T16:08:43.767',
            self::TYPE           => '234',
            self::BRAND          => 'brandData',
            self::ISSUE_BANK     => '10000',
            self::OWNER          => 'owner',
            self::LAST4          => 1234,
            self::CARD_TYPE      => '1',
            self::CARD_EXP_MONTH => '01',
            self::CARD_EXP_YEAR  => '2022'
        ];
    }
}
