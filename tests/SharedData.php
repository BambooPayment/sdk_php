<?php

namespace BambooPaymentTests;


use BambooPayment\Entity\Address;
use BambooPayment\Entity\TransactionStep;
use BambooPaymentTests\Entity\AddressEntityTest;
use BambooPaymentTests\Entity\TransactionStepEntityTest;

/**
 * Class SharedDataTest
 * @package BambooPaymentTests
 */
class SharedData extends BaseTest
{
    /**
     * @return array
     */
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

    /**
     * @return array
     */
    protected function getDataOfAddress(): array
    {
        return [
            'AddressId'     => 51615,
            'AddressType'   => 1,
            'Country'       => 'UY',
            'State'         => 'Montevideo',
            'AddressDetail' => '10000',
            'PostalCode'    => null,
            'City'          => 'MONTEVIDEO'
        ];
    }

    /**
     * @param array           $transactionStepData
     * @param TransactionStep $transactionStep
     */
    protected function makeTestOfTransactionStep(array $transactionStepData, $transactionStep): void
    {
        /* @var TransactionStep $transactionStep */
        self::assertEquals($transactionStepData[TransactionStepEntityTest::STEP], $transactionStep->getStep());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::CREATED], $transactionStep->getCreated());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::STATUS], $transactionStep->getStatus());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::RESPONSE_CODE], $transactionStep->getResponseCode());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::RESPONSE_MESSAGE], $transactionStep->getResponseMessage());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::ERROR], $transactionStep->getError());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::AUTHORIZATION_CODE], $transactionStep->getAuthorizationCode());
        self::assertEquals($transactionStepData[TransactionStepEntityTest::UNIQUE_ID], $transactionStep->getUniqueId());
    }

    protected function makeTestOfAddress(array $data, Address $address): void
    {
        self::assertEquals($data[AddressEntityTest::ADDRESS_ID], $address->getAddressId());
        self::assertEquals($data[AddressEntityTest::ADDRESS_TYPE], $address->getAddressType());
        self::assertEquals($data[AddressEntityTest::COUNTRY], $address->getCountry());
        self::assertEquals($data[AddressEntityTest::STATE], $address->getState());
        self::assertEquals($data[AddressEntityTest::ADDRESS_DETAIL], $address->getAddressDetail());
        self::assertEquals($data[AddressEntityTest::CITY], $address->getCity());
        self::assertNull($address->getPostalCode());
    }
}
