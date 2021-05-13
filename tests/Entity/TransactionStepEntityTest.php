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
    public const STEP                    = 'Step';
    public const CREATED                 = 'Created';
    public const STATUS                  = 'Status';
    public const RESPONSE_CODE           = 'ResponseCode';
    public const RESPONSE_MESSAGE        = 'ResponseMessage';
    public const ERROR                   = 'Error';
    public const AUTHORIZATION_CODE      = 'AuthorizationCode';
    public const UNIQUE_ID               = 'UniqueId';
    public const ACQUIRE_RESPONSE_DETAIL = 'AcquirerResponseDetail';

    public function testHydrate(): void
    {
        $transactionStep = new TransactionStep();
        $data            = $this->getDataOfTransactionStep();
        $transactionStep = $transactionStep->hydrate($data);

        $this->makeTestOfTransactionStep($data, $transactionStep);
    }
}
