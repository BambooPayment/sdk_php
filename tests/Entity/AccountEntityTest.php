<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Account;
use BambooPaymentTests\SharedData;

/**
 * Class AccountEntityTest
 * @package BambooPaymentTests\Entity
 */
class AccountEntityTest extends SharedData
{
    private const ACCOUNT_ID          = 'AccountId';
    private const NAME                = 'Name';
    private const PHONE               = 'Phone';
    private const CREATED             = 'Created';
    private const COMMERCE            = 'Commerce';
    private const PRIVATE_ACCOUNT_KEY = 'PrivateAccountKey';
    private const PUBLIC_ACCOUNT_KEY  = 'PublicAccountKey';
    private const ADDRESS             = Account::ADDRESS;


    public function testHydrate(): void
    {
        $account = new Account();

        $data = $this->getDataOfAccount();
        $account = $account->hydrate($data);

        self::assertEquals($data[self::ACCOUNT_ID], $account->getAccountId());
        self::assertEquals($data[self::NAME], $account->getName());
        self::assertEquals($data[self::PHONE], $account->getPhone());
        self::assertEquals($data[self::CREATED], $account->getCreated());
        self::assertEquals($data[self::COMMERCE], $account->getCommerce());
        self::assertEquals($data[self::PRIVATE_ACCOUNT_KEY], $account->getPrivateAccountKey());
        self::assertEquals($data[self::PUBLIC_ACCOUNT_KEY], $account->getPublicAccountKey());

        $this->makeTestOfAddress($data[self::ADDRESS], $account->getAddress());
    }

    private function getDataOfAccount(): array
    {
        return [
            self::ACCOUNT_ID          => 123432,
            self::NAME                => 'AccountName',
            self::PHONE               => '099123321',
            self::CREATED             => '2021-04-06T16:08:43.767',
            self::COMMERCE            => '10000',
            self::PRIVATE_ACCOUNT_KEY => '123',
            self::PUBLIC_ACCOUNT_KEY  => '321',
            self::ADDRESS             => $this->getDataOfAddress()
        ];
    }
}
