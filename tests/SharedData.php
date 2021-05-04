<?php

namespace BambooPaymentTests;


use BambooPaymentTests\Entity\TransactionStepEntityTest;

/**
 * Class SharedDataTest
 * @package BambooPaymentTests
 */
class SharedData extends BaseTest
{
    protected function getDataOfTransactionStep(): array
    {
        return [
            TransactionStepEntityTest::STEP               => 'FirstData Authorization with CVV',
            TransactionStepEntityTest::CREATED            => '2021-05-03T15:22:22.370',
            TransactionStepEntityTest::STATUS             => 'Approved',
            TransactionStepEntityTest::RESPONSE_CODE      => '0',
            TransactionStepEntityTest::RESPONSE_MESSAGE   => '00',
            TransactionStepEntityTest::ERROR              => '',
            TransactionStepEntityTest::AUTHORIZATION_CODE => '123456',
            TransactionStepEntityTest::UNIQUE_ID          => null
        ];
    }
}
