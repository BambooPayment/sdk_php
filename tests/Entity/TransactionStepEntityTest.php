<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\TransactionStep;
use BambooPaymentTests\SharedData;

/**
 * Class TransactionStepEntityTest
 * @package BambooPaymentTests\Entity
 */
class TransactionStepEntityTest extends SharedData
{
    protected const STEP               = 'Step';
    protected const CREATED            = 'Created';
    protected const STATUS             = 'Status';
    protected const RESPONSE_CODE      = 'ResponseCode';
    protected const RESPONSE_MESSAGE   = 'ResponseMessage';
    protected const ERROR              = 'Error';
    protected const AUTHORIZATION_CODE = 'AuthorizationCode';
    protected const UNIQUE_ID          = 'UniqueId';

    public function testHydrate(): void
    {
        $transactionStep = new TransactionStep();
        $data            = $this->getDataOfTransactionStep();
        $transactionStep = $transactionStep->hydrate($data);

        self::assertInstanceOf(TransactionStep::class, $transactionStep);
        self::assertEquals($data[self::STEP], $transactionStep->getStep());
        self::assertEquals($data[self::CREATED], $transactionStep->getCreated());
        self::assertEquals($data[self::STATUS], $transactionStep->getStatus());
        self::assertEquals($data[self::RESPONSE_CODE], $transactionStep->getResponseCode());
        self::assertEquals($data[self::RESPONSE_MESSAGE], $transactionStep->getResponseMessage());
        self::assertEquals($data[self::ERROR], $transactionStep->getError());
        self::assertEquals($data[self::AUTHORIZATION_CODE], $transactionStep->getAuthorizationCode());
        self::assertEquals($data[self::UNIQUE_ID], $transactionStep->getUniqueId());
    }
}
